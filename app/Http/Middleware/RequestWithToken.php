<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use TiMacDonald\Middleware\HasParameters;

class RequestWithToken
{

    use HasParameters;

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $isOn = false): Response
    {
        if($isOn){
    		$token = $request->input('token');
			if (empty($token)) {
                return abort(403, trans('auth.unauthorized'));
			}
    	}

        return $next($request);
    }
}
