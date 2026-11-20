@extends('layouts.app')

@section('title', 'Написать статью')

@section('content')
    <h1 class="text-2xl font-bold mb-6">Новая статья</h1>

    <form method="POST" action="{{ route('journalist.store') }}" class="bg-white p-6 rounded shadow max-w-2xl">
        @csrf

        <div class="mb-4">
            <label for="title" class="block font-medium mb-1">Заголовок</label>
            <input type="text" name="title" id="title" value="{{ old('title') }}"
                   class="w-full border border-gray-300 rounded p-2" required>
            @error('title') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label for="category" class="block font-medium mb-1">Категория</label>
            <input type="text" name="category" id="category" value="{{ old('category') }}"
                   class="w-full border border-gray-300 rounded p-2" required>
            @error('category') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label for="content" class="block font-medium mb-1">Текст статьи</label>
            <textarea name="content" id="content" rows="8"
                      class="w-full border border-gray-300 rounded p-2" required>{{ old('content') }}</textarea>
            @error('content') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Сохранить статью
        </button>
    </form>
@endsection