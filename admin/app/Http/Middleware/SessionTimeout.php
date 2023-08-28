<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionTimeout
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse) $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next): \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
    {
        $maxIdleTime = config('session.lifetime') * 60; // Convert minutes to seconds
        $user = Auth::user();

        if ($user && time() - strtotime($user->last_login) > $maxIdleTime) {
            Auth::logout();
            $request->session()->invalidate();
            return redirect()->route('login')->with('msg', 'Session expired. Please log in again.');
        }
        return $next($request);
    }
}
