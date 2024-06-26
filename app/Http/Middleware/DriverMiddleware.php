<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Driver;

class DriverMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if a user is authenticated
        if (auth()->check()) {
            // Get the authenticated user's email
            $email = auth()->user()->email;

            // Check if a user with this email exists in the drivers table
            $driver = Driver::where('email', $email)->first();

            // If the user is not in the drivers table, return an error response
            if (!$driver) {
                return response([
                    'message' => 'Unauthorized Driver',
                    'email' => $email,
                    'role' => auth()->user()->role,
                ], 401);
            }
        }

        // If the user is in the drivers table, continue with the request
        return $next($request);
    }
}