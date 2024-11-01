<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return string|null
     */
    protected function redirectTo($request): ?string
    {
        if (!$request->expectsJson()) {
            return route('login'); // Redirect ke rute login bawaan Laravel jika bukan request JSON
        }
    }
    public function handle($request, Closure $next, ...$guards)
    {
    if (Session::get('login_admin_flag', true)) {
        return $next($request);
    }
    if ($request->expectsJson()) {
        return response()->json(['error' => 'Unauthenticated'], 401);
    }
    if ($request->getRequestUri == '/admin' && !Session::get('login_admin_flag', true)) {
        return redirect()->route('login');
    }
    }
}
