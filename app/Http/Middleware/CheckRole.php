<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

// use Spatie\Permission\Exceptions\UnauthorizedException;

class CheckRole
{
    public function handle($request, Closure $next, $role, $guard = null)
    {
        // if (Auth::guard($guard)->guest()) {
        //     throw UnauthorizedException::notLoggedIn();
        // }

        $roles = is_array($role)
            ? $role
            : explode('|', $role);

        if (!Auth::guard($guard)->user()->hasAnyRole($roles)) {
            return response()->json(['message' => 'Youre Role Doesnt have Permsisson', 'roles' => $roles], 401);
            // throw UnauthorizedException::forRoles($roles);
        }

        return $next($request);
    }
}
