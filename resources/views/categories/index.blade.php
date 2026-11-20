@extends('layouts.app')

@section('title', 'Категории — NewsSite')

@section('content')
    <div class="section-head">
        <h1>Все категории</h1>
    </div>

    @if ($categories->isEmpty())
        <p class="empty">Категорий пока нет. Добавьте их через базу данных или сидер.</p>
    @else
        <div class="grid">
            @foreach ($categories as $category)
                <a href="{{ route('categories.show', $category) }}" class="card" style="text-decoration:none;color:inherit">
                    <h3 class="card-title">{{ $category->name }}</h3>
                    <p class="card-excerpt">Статей в категории: {{ $category->articles()->count() }}</p>
                    <span class="card-category">Перейти →</span>
                </a>
            @endforeach
        </div>
    @endif
@endsection