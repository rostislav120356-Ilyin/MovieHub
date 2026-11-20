@extends('layouts.app')

@section('title', 'Главная — Все новости')

@section('content')
    <h1 class="text-2xl font-bold mb-6">Все новости</h1>

    @forelse($articles as $article)
        <div class="bg-white p-5 rounded shadow mb-4">
            <h2 class="text-xl font-semibold">{{ $article->title }}</h2>
            <p class="text-sm text-gray-500">
                Автор: {{ $article->user->name }} | Категория: {{ $article->category }}
            </p>
            <p class="mt-2">{{ Str::limit($article->content, 200) }}</p>
        </div>
    @empty
        <p class="text-gray-600">Пока нет новостей.</p>
    @endforelse
@endsection