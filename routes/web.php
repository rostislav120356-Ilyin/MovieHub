
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\MovieAuthController;
use App\Http\Controllers\AdminController;

// Главная и каталог фильмов
Route::get('/', [MovieController::class, 'index'])->name('home');

// Страница отдельного фильма
Route::get('/movies/{movie}', [MovieController::class, 'show'])
    ->name('movies.show');

// Регистрация
Route::middleware('guest')->group(function () {
    Route::get('/register', [MovieAuthController::class, 'showRegister'])
        ->name('register');

    Route::post('/register', [MovieAuthController::class, 'register'])
        ->name('register.store');

    // Вход
    Route::get('/login', [MovieAuthController::class, 'showLogin'])
        ->name('login');

    Route::post('/login', [MovieAuthController::class, 'login'])
        ->name('login.store');
});

// Авторизованный пользователь
Route::middleware('auth')->group(function () {
    Route::post('/logout', [MovieAuthController::class, 'logout'])
        ->name('logout');

    Route::get('/dashboard', function () {
        return redirect()->route('home');
    })->name('dashboard');
});

// Админ-панель
Route::middleware('auth')
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/movies', [AdminController::class, 'index'])
            ->name('movies');

        Route::get('/movies/create', [AdminController::class, 'create'])
            ->name('movies.create');

        Route::post('/movies', [AdminController::class, 'store'])
            ->name('movies.store');

        Route::get('/movies/{movie}/edit', [AdminController::class, 'edit'])
            ->name('movies.edit');

        Route::put('/movies/{movie}', [AdminController::class, 'update'])
            ->name('movies.update');

        Route::delete('/movies/{movie}', [AdminController::class, 'destroy'])
            ->name('movies.destroy');
    });
