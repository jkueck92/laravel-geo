<?php

namespace App\Http\Middleware;

use App\Continent;
use Closure;
use Illuminate\Support\Facades\Auth;

class MiddlewareContinent
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
        if ($request->route()->getName() !== 'continents.index') {
            $objectId = $request->route()->parameter('continent');
            $continent = Continent::find($objectId);
            if (!empty($continent)) {
                if ($continent->user_id !== Auth::user()->id) {
                    abort(403, 'Unauthorized action.');
                }
            }
        }
        return $next($request);
    }
}
