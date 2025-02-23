<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class kiemTraKhachHangMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        $user   =   Auth::guard('sanctum')->user();
        if($user && $user instanceof \App\Models\KhachHang) {
            if($user->is_block) {
                return response()->json([
                    'status'    =>  false
                ]);
            }
            if($user->is_active == false) {
                return response()->json([
                    'status'    =>  false
                ]);
            }
            return $next($request);
        } else {
            return response()->json([
                'status'    =>  false
            ]);
        }
    }
}
