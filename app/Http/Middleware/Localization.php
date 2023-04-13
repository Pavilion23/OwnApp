<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\App;
//use Illuminate\Support\Facades\Config;

class Localization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        /*$rawLocale = Session::get('locale');
        if (in_array($rawLocale, Config::get('app.locales'))) {
            $locale =$rawLocale;
        }
        else $locale = Config::get('app.locale');
        App::setLocale(Session::get('locale'));*/

        if (Session::has('locale')) {
            //App::setLocale(Session::get('locale'));
            App::setLocale(Session('locale'));
        }
        return $next($request);
    }
}
