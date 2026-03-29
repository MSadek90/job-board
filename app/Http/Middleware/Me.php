<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class me
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth::check()) {
            if (auth::user()->email == 'qc@neop.sa') {
                return $next($request);
            }
            return response(["message"=>"You are not allowed to access this page"],403);
        }
        return redirect('/login');
    }
}
