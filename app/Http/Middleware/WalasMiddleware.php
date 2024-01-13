<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class WalasMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $admin = $request->session()->get("user_email");
        $nuptk = $request->session()->get("nuptk");
        $nis = $request->session()->get("nis");

        // $url = $request->url();
        // dd([$nuptk, $nis, $url,strpos($url, 'walas') !== false]);
        // Mengecek apakah kata "walas" ada dalam URL
        if ($nuptk || $admin) {
            if($request->session()->exists("nuptk") || 
                $request->session()->exists("user_email")){
                return $next($request);
            }else{
                return redirect("/walas/login");
            }
        } else {
            if($request->session()->exists("nis")){
                return $next($request);
            }else{
                return redirect("/sekretaris/login");
            }
        }
    }
}
