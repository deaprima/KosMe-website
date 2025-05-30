<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class PreventAdminOwnerAccess
{
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            $user = Auth::user();
            $currentPath = $request->path();

            // Allow access to their respective dashboard routes
            if ($user->role === 'admin' && str_starts_with($currentPath, 'admin')) {
                return $next($request);
            }
            if ($user->role === 'owner' && str_starts_with($currentPath, 'owner')) {
                return $next($request);
            }

            // Redirect to respective dashboard for other routes
            if ($user->role === 'admin') {
                return redirect('/admin');
            } elseif ($user->role === 'owner') {
                return redirect('/owner');
            }
        }

        return $next($request);
    }
}
