<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserIsAdmin
{
    public function handle(Request $request, Closure $next): Response
    {

        if (! auth()->user() || ! auth()->user()->isAdmin) {
            $errorMessage = 'You must be an admin to access this page.';
            $errorCode = 403; // HTTP status code for Forbidden

            return redirect(route('home'))
                ->with('error', $errorMessage)
                ->with('errorCode', $errorCode);
        }

        return $next($request);
    }
}
