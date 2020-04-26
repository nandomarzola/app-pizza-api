<?php

namespace App\Http\Middleware;

use Error;
use Closure;
use App\Supports\RoleSupport;
use Tymon\JWTAuth\Facades\JWTAuth;

class CheckAdminUser
{
    /**
     * @param mixed $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = JWTAuth::parseToken()->authenticate();

        if ($user->role->id !== RoleSupport::ADMIN_ROLE) {
            throw new Error('This route is not allowed for common users',403);
        }

        return $next($request);
    }
}
