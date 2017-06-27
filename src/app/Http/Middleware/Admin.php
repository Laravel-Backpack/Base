<?php

namespace Backpack\Base\app\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     * @param string|null              $guard
     *
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->guest()) {
            if ($request->ajax() || $request->wantsJson()) {
                abort(403);
            } else {
                if (!config('backpack.base.permission_protection')) 
                {
                    return redirect()->guest(config('backpack.base.route_prefix', 'admin').'/login');
                }
                return redirect()->guest('/login');
            }
        }

        else if (config('backpack.base.permission_protection')) 
        {
            if (! $request->user()->can(config('backpack.base.permission_name'))) {
                abort(403);          
            }
        }

            

        return $next($request);
    }
}
