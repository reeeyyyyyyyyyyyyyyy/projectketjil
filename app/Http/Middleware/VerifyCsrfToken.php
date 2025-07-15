<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        // Tambahkan route yang ingin dikecualikan dari CSRF jika diperlukan
        // 'api/*',
         'login',
    ];

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    // public function handle($request, \Closure $next)
    // {
    //     // Cek apakah ini adalah request AJAX dengan token yang expired
    //     if ($request->ajax() && $request->session()->token() !== $request->input('_token')) {
    //         return response()->json(['error' => 'CSRF token mismatch'], 419);
    //     }

    //     return parent::handle($request, $next);
    // }
}
