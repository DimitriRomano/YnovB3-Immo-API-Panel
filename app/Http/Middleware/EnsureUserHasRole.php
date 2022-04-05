<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class EnsureUserHasRole
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param string $role
     * @return JsonResponse
     */
    public function handle(Request $request, Closure $next, string $role)
    {
        $user = $request->user();
        if($user->role->name === $role) {
            return $next($request);
        };
        return response() -> json(['message' => 'Unauthorized'], 401);
    }
}
