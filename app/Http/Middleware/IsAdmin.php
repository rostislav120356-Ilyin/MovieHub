public function handle(Request $request, Closure $next): Response
{
    if (!auth()->check() || !auth()->user()->isAdmin()) {
        abort(403, 'Доступ запрещен. Только для администратора.');
    }
    return $next($request);
}