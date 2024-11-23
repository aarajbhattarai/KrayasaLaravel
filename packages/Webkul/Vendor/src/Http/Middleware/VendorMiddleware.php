<?php

namespace Webkul\Vendor\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class VendorMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (! auth()->guard('vendor')->check()) {
            return redirect()->route('vendor.login');
        }

        if (! auth()->guard('vendor')->user()->status) {
            auth()->guard('vendor')->logout();

            return redirect()->route('vendor.login')
                ->with('error', trans('vendor::app.errors.account-not-active'));
        }

        return $next($request);
    }
}