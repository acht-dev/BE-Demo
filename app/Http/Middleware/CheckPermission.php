<?php

namespace App\Http\Middleware;

use Closure;

class CheckPermission
{
    public function handle($request, Closure $next, $permission, $guard = null)
    {
        // if (app('auth')->guard($guard)->guest()) {
        //     throw UnauthorizedException::notLoggedIn();
        // }

        $permissions = is_array($permission)
            ? $permission
            : explode('|', $permission);

        foreach ($permissions as $permission) {
            if (app('auth')->guard($guard)->user()->can($permission)) {
                return $next($request);
            }
        }

        return response()->json(['message' => 'Youre Role Doesnt have Permsisson'], 401);
        // throw UnauthorizedException::forPermissions($permissions);
    }
}
