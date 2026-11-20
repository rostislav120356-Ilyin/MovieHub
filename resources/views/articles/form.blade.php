<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Статья</title>
</head>
<body>
    <h1>{{ isset($article) ? 'Редактировать статью' : 'Добавить новость' }}</h1>

    <form
        action="{{ isset($article) ? route('articles.update', $article) : route('articles.store') }}"
        method="POST"
    >
        @csrf

        @if(isset($article))
            @method('PUT')
        @endif

        <p>Заголовок</p>
        <input type="text" name="title"
               value="{{ old('title', $article->title ?? '') }}" required>

        <p>Текст новости</p>
        <textarea name="content" required>{{ old('content', $article->content ?? '') }}</textarea>

        <p>Категория</p>
        <select name="category" required>
            <option value="general">Общие</option>
            <option value="sport">Спорт</option>
            <option value="technology">Технологии</option>
        </select>

        <br><br>
        <button type="submit">Сохранить</button>
    </form>

    <p><a href="/journalist">Назад</a></p>
</body>
</html>