
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Админ-панель — MovieHub</title>
    <style>
        * { box-sizing: border-box; }
        body {
            margin: 0;
            background: #101116;
            color: white;
            font-family: Arial, sans-serif;
        }
        header {
            padding: 22px 7%;
            background: #17181f;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
        }
        .logo { color: #e5093c; font-size: 26px; font-weight: bold; }
        a { color: #e5093c; text-decoration: none; }
        .container { width: 90%; max-width: 1200px; margin: 35px auto; }
        h1 { margin-bottom: 25px; }
        h2 { margin-top: 40px; }
        .button {
            display: inline-block;
            background: #e5093c;
            color: white;
            padding: 11px 16px;
            border-radius: 7px;
            border: 0;
            cursor: pointer;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background: #1b1c24;
        }
        th, td {
            text-align: left;
            padding: 13px;
            border-bottom: 1px solid #30313b;
        }
        th { color: #e5093c; }
        .success { color: #69d69b; margin: 15px 0; }
        .actions { display: flex; gap: 10px; align-items: center; flex-wrap: wrap; }
        .delete-button {
            background: #8d1832;
            color: white;
            padding: 9px 12px;
            border: 0;
            border-radius: 6px;
            cursor: pointer;
        }
        @media(max-width: 700px) {
            .container { width: 96%; overflow-x: auto; }
            table { min-width: 650px; }
        }
    </style>
</head>
<body>

<header>
    <div class="logo">MovieHub | Админ-панель</div>
    <div>
        <a href="{{ route('home') }}">На сайт</a>
        &nbsp; | &nbsp;
        <span>{{ auth()->user()->name }}</span>
        &nbsp; | &nbsp;
        <form action="{{ route('logout') }}" method="POST" style="display:inline">
            @csrf
            <button class="button" type="submit">Выйти</button>
        </form>
    </div>
</header>

<div class="container">

    <h1>Панель управления</h1>

    @if(session('success'))
        <p class="success">{{ session('success') }}</p>
    @endif

    <a href="{{ route('admin.movies.create') }}" class="button">
        + Добавить фильм
    </a>

    <h2>Фильмы ({{ $movies->count() }})</h2>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Название</th>
                <th>Жанр</th>
                <th>Год</th>
                <th>Рейтинг</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            @forelse($movies as $movie)
                <tr>
                    <td>{{ $movie->id }}</td>
                    <td>{{ $movie->title }}</td>
                    <td>{{ $movie->genre }}</td>
                    <td>{{ $movie->year }}</td>
                    <td>{{ $movie->rating }}</td>
                    <td>
                        <div class="actions">
                            <a href="{{ route('admin.movies.edit', $movie) }}">Изменить</a>

                            <form
                                action="{{ route('admin.movies.destroy', $movie) }}"
                                method="POST"
                                onsubmit="return confirm('Удалить этот фильм?')"
                            >
                                @csrf
                                @method('DELETE')
                                <button class="delete-button" type="submit">
                                    Удалить
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">Фильмов пока нет.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <h2>Зарегистрированные пользователи ({{ $users->count() }})</h2>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Имя</th>
                <th>Электронная почта</th>
                <th>Роль</th>
            </tr>
        </thead>
        <tbody>
            @forelse($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">Пользователей пока нет.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

</div>

</body>
</html>
