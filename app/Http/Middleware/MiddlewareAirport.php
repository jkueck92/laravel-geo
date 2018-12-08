<?php

namespace App\Http\Middleware;

use App\Airport;
use Closure;
use Illuminate\Support\Facades\Auth;

class MiddlewareAirport
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
        if ($request->route()->getName() !== 'airports.index') {
            $objectId = $request->route()->parameter('airport');
            $airport = Airport::find($objectId);
            if (!empty($airport)) {
                if ($airport->user_id !== Auth::user()->id) {
                    abort(403, 'Unauthorized action.');
                }
            }
        }
        return $next($request);
    }
}
