<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MobileOnly
{
    public function handle(Request $request, Closure $next): Response
    {
        $userAgent = strtolower($request->header('User-Agent', ''));

        // Cek apakah request dari HP (Android/iPhone)
        if (preg_match('/android|iphone|ipod|ipad|windows phone|blackberry/i', $userAgent)) {
            return $next($request);
        }

        // Kalau bukan HP, tampilkan halaman khusus
        return response()->view('errors.Mobile-only', [], 403);
    }
}
