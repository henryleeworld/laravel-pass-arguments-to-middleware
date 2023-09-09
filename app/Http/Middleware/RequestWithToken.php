<?php

namespace App\Http\Middleware;

use Closure;
use \Illuminate\Support\Facades\Redirect;
use TiMacDonald\Middleware\HasParameters;

class RequestWithToken
{

    use HasParameters;

    /**
     * Run the request filter.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $isOn = false)
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