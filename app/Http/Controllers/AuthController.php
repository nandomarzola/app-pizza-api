<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Supports\RoleSupport;
use App\Repositories\UserRepository;

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
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function register (Request $request)
    {
        // Validate data
        $data = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|unique:users|email|max:255',
            'password' => 'required|min:6|max:255'
        ]);

        // Get data and encrypt password
        $rawPassword = $data['password'];
        $data['password'] = bcrypt($data['password']);
        $data['role_id'] = RoleSupport::USER_ROLE;

        // Create user
        $user = $this->repository->create($data);

        // Return the user login to get its JWT Token
        return $this->login(
            [
                'email' => $user->email,
                'password' => $rawPassword,
                'role_id' => $user->role_id
            ]
        );
    }

    /**
     * @param array $credentials
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(array $credentials = [])
    {
        $credentials = !empty($credentials) ? $credentials : request(['email', 'password']);

        $token = auth()->attempt($credentials);

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
