<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, string ...$roles): Response
    {
        $user = $request->user();

        if (!$user) {
            return redirect()->route('login');
        }

        // Проверяем, не заблокирован ли пользователь
        if ($user->isBlocked()) {
            Auth::logout();

            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()->route('login')
                ->withErrors([
                    'email' => 'Ваш аккаунт заблокирован администратором.'
                ]);
        }

        // Проверяем роль пользователя
        if (!in_array($user->role, $roles, true)) {
            abort(403, 'У вас недостаточно прав для доступа к этой странице.');
        }

        return $next($request);
    }
}
