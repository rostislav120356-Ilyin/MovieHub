<?php

namespace App\Http\Controllers;
use App\Models\Movie;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Проверка прав администратора
    private function checkAdmin(): void
    {
        abort_unless(
            auth()->check() && auth()->user()->role === 'admin',
            403,
            'Доступ разрешён только администратору.'
        );
    }

    // Главная страница админ-панели
    public function index()
    {
        $this->checkAdmin();

        $movies = Movie::orderBy('id', 'desc')->get();
        $users = User::orderBy('id', 'desc')->get();

        return view('admin.index', compact('movies', 'users'));
    }

    // Форма добавления фильма
    public function create()
    {
        $this->checkAdmin();

        $movie = new Movie();

        return view('admin.form', compact('movie'));
    }

    // Сохранение фильма
    public function store(Request $request)
    {
        $this->checkAdmin();

        $validated = $this->validateMovie($request);

        Movie::create($validated);

        return redirect()->route('admin.movies')
            ->with('success', 'Фильм успешно добавлен.');
    }

    // Форма редактирования фильма
    public function edit(Movie $movie)
    {
        $this->checkAdmin();

        return view('admin.form', compact('movie'));
    }

    // Обновление фильма
    public function update(Request $request, Movie $movie)
    {
        $this->checkAdmin();

        $validated = $this->validateMovie($request);

        $movie->update($validated);

        return redirect()->route('admin.movies')
            ->with('success', 'Фильм успешно обновлён.');
    }

    // Удаление фильма
    public function destroy(Movie $movie)
    {
        $this->checkAdmin();

        $movie->reviews()->delete();
        $movie->favorites()->delete();
        $movie->delete();

        return redirect()->route('admin.movies')
            ->with('success', 'Фильм удалён.');
    }

    // Проверка данных фильма
    private function validateMovie(Request $request): array
    {
        return $request->validate([
            'title' => 'required|string|max:255',
            'genre' => 'required|string|max:100',
            'year' => 'required|integer|min:1888|max:2100',
            'description' => 'nullable|string',
            'poster' => 'nullable|url|max:2048',
            'rating' => 'nullable|numeric|min:0|max:10',
            'watch_url' => 'nullable|url|max:2048',
            'video_url' => 'nullable|url|max:2048',
        ]);
    }
}

