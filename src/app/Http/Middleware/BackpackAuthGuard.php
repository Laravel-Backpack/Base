<?php

namespace Backpack\Base\app\Http\Middleware;

use Closure;

class BackpackAuthGuard
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (config('backpack.base.separate_admin_session')) {
            if (!\Auth::guard(config('backpack.base.admin_guard.name'))->check()) {
                if ($request->ajax() || $request->wantsJson()) {
                    return response(trans('backpack::base.unauthorized'), 401);
                }

                return redirect(config('backpack.base.route_prefix').'/login');
            }
        }

        return $next($request);
    }
}
