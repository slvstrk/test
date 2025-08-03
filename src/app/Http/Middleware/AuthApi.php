<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthApi
{
    public function handle(Request $request, Closure $next): Response
    {
        $plainToken = $request->bearerToken();

        if (!$plainToken) {
            return response()->json([
                'message' => 'Токен не передан!'
            ], 401);
        }

        $hashedToken = hash('sha256', $plainToken);

        $user = User::where('token', $hashedToken)->first();

        if (!$user) {
            return response()->json([
                'message' => 'Неверный токен'
            ], 401);
        }

        Auth::setUser($user);
        $request->setUserResolver(fn () => $user);

        return $next($request);
    }
}
