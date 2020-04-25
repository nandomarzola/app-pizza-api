<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use App\Exceptions\ExceptionHandler;

class AuthController extends Controller
{
    /**
     * @var UserRepository
     */
    protected $repository;

    /**
     * AuthController constructor.
     * @param UserRepository $repository
     * @return void
     */
    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
        $this->middleware('auth:api', ['except' => ['register','login']]);
    }

    /**
     * Register an user on the database and return its JWT Token
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws ExceptionHandler
     */
    public function register (Request $request)
    {
        try {
            // Get data and encrypt password
            $data = $request->all();
            $rawPassword = $data['password'];
            $data['password'] = bcrypt($data['password']);

            // Verify if the email is being used
            $userExists = $this->repository->findByField('email', $data['email']);
            if ($userExists) {
                return response()->json(
                    ['message' => 'An user with the provided email already exists'],
                    400
                );
            }

            // Create user
            $user = $this->repository->create($data);

            // Return the user login to get its JWT Token
            return $this->login(
                [
                    'email' => $user->email,
                    'password' => $rawPassword,
                ]
            );
        } catch (Exception $exception) {
            throw new ExceptionHandler($exception->getMessage());
        }
    }

    /**
     * Get a JWT via given credentials.
     *
     * @param array $credentials
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(array $credentials = [])
    {
        $credentials = !empty($credentials) ? $credentials : request(['email', 'password']);

        if (! $token = auth()->attempt($credentials)) {
            return response()->json(
                ['error' => 'Unauthorized or no credentials provided'],
                401
            );
        }

        return $this->respondWithToken($token);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth()->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
}
