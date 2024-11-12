<?php

namespace App\Http\Middleware;

use App\Models\Menu;
use App\Models\SettingMenu;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Symfony\Component\HttpFoundation\Response;

class LoadNavbarMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $IDuser_saat_ini = Auth::user()->ID_jenis_user;
        $navbar = SettingMenu::where('ID_jenis_user', '=', $IDuser_saat_ini)->get();
        View::share('navbar', $navbar);

        return $next($request);
    }
}
