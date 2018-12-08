<?php

namespace App\Http\Middleware;

use App\Country;
use Closure;

class MiddlewareCountry
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->route()->getName() !== 'countries.index') {
            $objectId = $request->route()->parameter('countries');
            $country = Country::find($objectId);
            if (!empty($country)) {
                if ($country->user_id !== Auth::user()->id) {
                    abort(403, 'Unauthorized action.');
                }
            }
        }
        return $next($request);
    }
}
