<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckPreviousUrlName
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $routeToCheck,$routeToRedirect)
    {
        //dd($request);
        $routesToCheck = is_array($routeToCheck)
            ? $routeToCheck
            : explode('|', $routeToCheck);

        try {
            $routeName = app('router')->getRoutes()->match(app('request')->create(url()->previous()))->getName();
        } catch (\Throwable $th) {
            if($th->getMessage() == "The GET method is not supported for this route. Supported methods: POST."){
                $routeName = app('router')->getRoutes()->match(app('request')->create(url()->previous(),'POST'))->getName();
            }
        }
        
        if(!in_array($routeName,$routesToCheck)){
            return redirect()->route($routeToRedirect);
        }

        return $next($request);
    }
}
