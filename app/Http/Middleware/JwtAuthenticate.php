<?php

namespace App\Http\Middleware;

use Error;
use Closure;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;

class JwtAuthenticate
{
    /**
     * @param mixed $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        try {
            JWTAuth::parseToken()->authenticate();
        } catch (TokenExpiredException $exception) {
            throw new Error('The given token has expired', 400);
        } catch (TokenInvalidException $exception) {
            throw new Error('The given token is invalid', 400);
        } catch (JWTException $exception) {
            throw new Error('The token is missing on the request', 400);
        }

        return $next($request);
    }
}
