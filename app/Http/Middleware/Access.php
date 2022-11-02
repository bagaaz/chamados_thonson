<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Access
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $params = $request->request->all();

        Auth::attempt(['email' => $params['email'], 'password' => $params['senha']]);

        /*
        0 - Admin
        1 - Support
        2 - Caller
        */
        if (Auth::check() && Auth::user()->type_access == 0) {
            //manda para rota do admin
            return $next($request);
        } else if(Auth::check() && Auth::user()->type_access == 1) {
            //manda para a rota do suporte
            return $next($request);
        } else if (Auth::check() && Auth::user()->type_access == 2) {
            //manda para a rota do usuario
            return $next($request);
        } else {
            //retorna que não tem acesso
            return response()->view('auth.login', ['menssagem' => 'Login ou senha incorretos, tente novamente !']);
        }
    }
}
