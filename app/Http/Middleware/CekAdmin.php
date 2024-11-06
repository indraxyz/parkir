<?php

namespace App\Http\Middleware;

use Closure;

class CekAdmin
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
        if(!$request->session()->has('user')){
            return redirect('/');
        }

        $response = $next($request);
        // agar setelah logout jika back tetap cek kesini
        return $response->header('Cache-Control', 'no-store, no-cache, must-revalidate, post-check=0, pre-check=0');

    }
}
