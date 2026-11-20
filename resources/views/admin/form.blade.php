
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Фильм — MovieHub</title>
    <style>
        * { box-sizing: border-box; }
        body {
            background: #101116;
            color: white;
            font-family: Arial, sans-serif;
            padding: 30px;
        }
        .form-box {
            max-width: 650px;
            margin: 30px auto;
            padding: 30px;
            background: #1b1c24;
            border-radius: 14px;
        }
        h1 { color: #e5093c; }
        label { display: block; margin-top: 17px; color: #ccc; }
        input, textarea {
            width: 100%;
            padding: 12px;
            margin-top: 7px;
            background: #101116;
            border: 1px solid #393a45;
            border-radius: 7px;
            color: white;
        }
        textarea { min-height: 100px; resize: vertical; }
        button {
            margin-top: 22px;
            padding: 13px 20px;
            background: #e5093c;
            color: white;
            border: 0;
            border-radius: 7px;
            cursor: pointer;
        }
        a { color: #e5093c; text-decoration: none; }
        .errors { color: #ff7777; }
    </style>
</head>
<body>

<div class="form-box">

    <h1>{{ $movie->exists ? 'Изменить фильм' : 'Добавить фильм' }}</h1>

    <p><a href="{{ route('admin.movies') }}">← Назад в админ-панель</a></p>

    @if($errors->any())
        <div class="errors">
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form
        action="{{ $movie->exists
            ? route('admin.movies.update', $movie)
            : route('admin.movies.store') }}"
        method="POST"
    >
        @csrf

        @if($movie->exists)
            @method('PUT')
        @endif

        <label>Название фильма</label>
        <input name="title" value="{{ old('title', $movie->title) }}" required>

        <label>Жанр</label>
        <input name="genre" value="{{ old('genre', $movie->genre) }}" required>

        <label>Год</label>
        <input type="number" name="year"
               value="{{ old('year', $movie->year) }}" required>

        <label>Описание</label>
        <textarea name="description">{{ old('description', $movie->description) }}</textarea>

        <label>Ссылка на постер</label>
        <input type="url" name="poster"
               value="{{ old('poster', $movie->poster) }}">

        <label>Рейтинг</label>
        <input type="number" step="0.1" min="0" max="10" name="rating"
               value="{{ old('rating', $movie->rating) }}">

        <label>Ссылка на трейлер YouTube</label>
        <input type="url" name="watch_url"
               value="{{ old('watch_url', $movie->watch_url) }}">

        <label>Прямая ссылка на MP4 (необязательно)</label>
        <input type="url" name="video_url"
               value="{{ old('video_url', $movie->video_url) }}">

        <button type="submit">
            {{ $movie->exists ? 'Сохранить изменения' : 'Добавить фильм' }}
        </button>
    </form>

</div>

</body>
</html>
