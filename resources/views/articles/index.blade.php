<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Новостной портал</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f1f5f9;
            color: #222;
        }

        header {
            background: #1e293b;
            color: white;
            padding: 20px;
        }

        .header-content {
            max-width: 1100px;
            margin: auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
        }

        nav a {
            color: white;
            text-decoration: none;
            margin: 5px 10px;
        }

        .container {
            max-width: 1100px;
            margin: 30px auto;
            padding: 0 15px;
        }

        .article {
            background: white;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 6px #00000010;
        }

        .article h2 {
            margin-top: 0;
            color: #1e293b;
        }

        .category {
            color: #2563eb;
            font-weight: bold;
        }

        .message {
            background: #dcfce7;
            padding: 12px;
            margin-bottom: 20px;
            border-radius: 5px;
        }

        .button {
            display: inline-block;
            background: #2563eb;
            color: white;
            padding: 9px 14px;
            border-radius: 5px;
            text-decoration: none;
        }

        .empty {
            background: white;
            padding: 25px;
            border-radius: 8px;
        }
    </style>
</head>

<body>

<header>
    <div class="header-content">
        <h1>Новостной портал</h1>

        <nav>
            <a href="{{ route('home') }}">Главная</a>
            <a href="{{ route('category.show', 'general') }}">Общие</a>
            <a href="{{ route('category.show', 'sport') }}">Спорт</a>
            <a href="{{ route('category.show', 'technology') }}">Технологии</a>

            @auth
                @if(auth()->user()->role === 'journalist' || auth()->user()->role === 'admin')
                    <a href="{{ route('journalist.index') }}">Журналист</a>
                @endif

                @if(auth()->user()->role === 'admin')
                    <a href="{{ route('admin.panel') }}">Админка</a>
                @endif

                <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit">Выйти</button>
                </form>
            @else
                <a href="{{ route('login') }}">Войти</a>
                <a href="{{ route('register') }}">Регистрация</a>
            @endauth
        </nav>
    </div>
</header>

<div class="container">

    @if(session('success'))
        <div class="message">
            {{ session('success') }}
        </div>
    @endif

    <h2>Последние новости</h2>

    @forelse($articles as $article)
        <div class="article">
            <h2>{{ $article->title }}</h2>

            <p class="category">
                Категория: {{ $article->category }}
            </p>

            <p>{{ $article->content }}</p>

            <small>
                Автор: {{ $article->user->name ?? 'Неизвестен' }}
            </small>
        </div>
    @empty
        <div class="empty">
            <h3>Новостей пока нет</h3>
            <p>Здесь будут отображаться опубликованные новости.</p>
        </div>
    @endforelse

</div>

</body>
</html>