<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    // Главная страница с каталогом
    public function index(Request $request)
    {
        $query = Movie::query();

        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        $movies = $query->orderBy('title')->get();

        return view('movies.index', compact('movies'));
    }

    // Страница отдельного фильма
    public function show(Movie $movie)
    {
        return view('movies.show', compact('movie'));
    }
}