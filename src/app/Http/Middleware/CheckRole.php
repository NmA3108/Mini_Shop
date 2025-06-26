<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role = 'user'): Response
    {
        // Kiểm tra xem người dùng có vai trò phù hợp không
        if (!Auth::check() || Auth::user()->role !== $role) {
            // Nếu không, trả về lỗi 403 Forbidden
            abort(403, 'Unauthorized');
        }

        return $next($request);
    }
}
