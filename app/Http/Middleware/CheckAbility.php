<?php

namespace App\Http\Middleware;

use App\Repository\RoleRepository;
use Closure;
use Illuminate\Http\Request;

class CheckAbility
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse) $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        return $next($request);

        // $route = $request->route()->getName();
        //
        // if ($route && !RoleRepository::checkAbility($route)) {
        //     return response(['message' => trans('auth.not_allowed')], 403);
        // }
        //
        // return $next($request);
    }
}
