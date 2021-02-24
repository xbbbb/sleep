<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Closure;

class SetLocale
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    public function handle($request, Closure $next)
    {
        if(Session::has("lan")){
            App::setlocale(Session::get("lan"));
        }
        return $next($request);
    }
}
