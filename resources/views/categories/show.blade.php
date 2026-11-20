@extends('layouts.app')

@section('title', $category->name . ' — NewsSite')

@section('content')
    <div class="section-head">
        <h1>Категория: {{ $category->name }}</h1>
        <a href="{{ route('categories.index') }}" class="btn btn-light">Все категории</a>
    </div>

    @if ($articles->isEmpty())
        <p class="empty">В этой категории пока нет статей.</p>
    @else
        <div class="grid">
            @foreach ($articles as $article)
                <x-article-card :article="$article" />
            @endforeach
        </div>
        <div class="pagination-wrap">{{ $articles->links() }}</div>
    @endif
@endsection