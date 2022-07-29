<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Impersonate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    // public function handle(Request $request, Closure $next)
    // {
    //     if($request->session()->has('impersonate'))
    //     {
    //         $user = User::find($request->session()->get('impersonate'));
    //         Auth::login($user);
    //         // Auth::loginUsingId($request->session()->get('impersonate'));
    //     }

    //     return $next($request);
    // }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::check() && Auth::user()->roles[0]->name == "admin" && session()->has('impersonate')) {

            // Auth::onceUsingID(session('impersonate'));
            // $user = User::find(session('impersonate'));
            Auth::guard('web')->onceUsingId(session('impersonate'));
        }

        // dd($request);

        return $next($request);
    }
}
