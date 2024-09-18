<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param  \Closure(Request): (Response|RedirectResponse)  $next
     * @return Response|RedirectResponse
     */
    public function handle(Request $request, Closure $next, $role)
    {
        $user = Auth::user();

        // Check if user is authenticated and has the correct role
        if ($user && $user->role === $role) {
            return $next($request);
        }

        // If user is an admin, redirect to admin dashboard
        if ($user && $user->role === 'admin') {
            return redirect()->route('home');
        }

        // If user is a client, redirect to client dashboard
        if ($user && $user->role === 'client') {
            return redirect()->route('client-dashboard');
        }

        // If the user is not authenticated or has an invalid role, redirect to login
        return redirect()->route('login');
    }
}
