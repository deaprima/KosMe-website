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

            // Define allowed paths for each role
            $adminAllowedPaths = ['admin', 'logout'];
            $ownerAllowedPaths = ['owner', 'logout'];

            // If user is admin
            if ($user->role === 'admin') {
                foreach ($adminAllowedPaths as $path) {
                    if (str_starts_with($currentPath, $path)) {
                        return $next($request);
                    }
                }
                return redirect('/admin')->with('error', 'Access denied. Admin can only access admin dashboard.');
            }

            // If user is owner
            if ($user->role === 'owner') {
                foreach ($ownerAllowedPaths as $path) {
                    if (str_starts_with($currentPath, $path)) {
                        return $next($request);
                    }
                }
                return redirect('/owner')->with('error', 'Access denied. Owner can only access owner dashboard.');
            }
        }

        return $next($request);
    }
}
