
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MovieHub — Мир кино</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: #101116;
            color: #f4f4f5;
            font-family: Arial, sans-serif;
        }

        header {
            background: #17181f;
            border-bottom: 1px solid #292a33;
            padding: 20px 7%;
        }

        .nav {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            flex-wrap: wrap;
        }

        .logo {
            font-size: 26px;
            font-weight: bold;
            color: #e5093c;
        }

        nav a {
            color: #ccc;
            text-decoration: none;
            margin: 0 12px;
        }

        nav a:hover {
            color: white;
        }

        .account a {
            color: white;
            text-decoration: none;
            margin-left: 12px;
        }

        .hero {
            margin: 35px auto;
            width: 86%;
            min-height: 350px;
            border-radius: 20px;
            padding: 60px;
            background:
                linear-gradient(90deg, #17181f 0%, #17181fdd 45%, #17181f33 100%),
                linear-gradient(135deg, #7d1638, #1c263d, #101116);
            display: flex;
            align-items: center;
        }

        .hero-content {
            max-width: 600px;
        }

        .hero small {
            color: #e5093c;
            font-weight: bold;
            letter-spacing: 2px;
        }

        .hero h1 {
            font-size: 48px;
            margin: 20px 0;
        }

        .hero p {
            color: #c4c4c9;
            line-height: 1.7;
        }

        .hero a {
            display: inline-block;
            margin-top: 25px;
            background: #e5093c;
            color: white;
            text-decoration: none;
            padding: 13px 24px;
            border-radius: 8px;
        }

        .container {
            width: 86%;
            margin: 40px auto;
        }

        .section-title {
            font-size: 28px;
            margin-bottom: 25px;
        }

        .search {
            display: flex;
            gap: 10px;
            margin-bottom: 30px;
        }

        .search input {
            flex: 1;
            padding: 14px;
            border: 1px solid #30313b;
            border-radius: 8px;
            background: #1b1c24;
            color: white;
        }

        .search button {
            border: none;
            padding: 14px 22px;
            background: #e5093c;
            color: white;
            border-radius: 8px;
            cursor: pointer;
        }

        .movies {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(210px, 1fr));
            gap: 24px;
        }

        .movies > a {
            display: block;
            color: inherit;
            text-decoration: none;
        }

        .movie-card {
            background: #1b1c24;
            border-radius: 14px;
            overflow: hidden;
            transition: 0.25s;
            border: 1px solid #292a33;
            cursor: pointer;
            height: 100%;
        }

        .movie-card:hover {
            transform: translateY(-5px);
            border-color: #e5093c;
        }

        .poster {
            height: 300px;
            background: linear-gradient(135deg, #333, #17181f);
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .poster img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .poster-failed::after {
            content: "Постер недоступен";
            color: #aaa;
        }

        .movie-info {
            padding: 17px;
        }

        .movie-info h3 {
            margin-bottom: 10px;
        }

        .movie-info p {
            color: #999;
            margin: 7px 0;
            font-size: 14px;
        }

        .rating {
            color: #ffc107 !important;
            font-weight: bold;
        }

        .empty {
            color: #aaa;
            padding: 25px 0;
        }

        footer {
            text-align: center;
            padding: 35px;
            color: #777;
            border-top: 1px solid #292a33;
            margin-top: 60px;
        }

        @media (max-width: 700px) {
            .hero {
                padding: 30px;
            }

            .hero h1 {
                font-size: 34px;
            }

            header {
                padding: 20px;
            }

            .container, .hero {
                width: 92%;
            }
        }
    </style>
</head>

<body>

<header>
    <div class="nav">
        <div class="logo">MovieHub</div>

        <nav>
            <a href="/">Главная</a>
            <a href="#catalog">Фильмы</a>
        </nav>

        <div class="account">
            @auth
                <span>{{ auth()->user()->name }}</span>

                @if(auth()->user()->isAdmin())
                    <a href="{{ route('admin.movies') }}">Админка</a>
                @endif

                <form action="{{ route('logout') }}" method="POST" style="display:inline">
                    @csrf
                    <button type="submit" style="background:none;border:none;color:white;cursor:pointer;margin-left:12px">
                        Выйти
                    </button>
                </form>
            @else
                <a href="{{ route('login') }}">Войти</a>
                <a href="{{ route('register') }}">Регистрация</a>
            @endauth
        </div>
    </div>
</header>

<section class="hero">
    <div class="hero-content">
        <small>МИР КИНО</small>
        <h1>Открой для себя новое кино</h1>

        <p>
            Исследуй фильмы разных жанров, находи любимые истории,
            сохраняй фильмы и делись своим мнением.
        </p>

        <a href="#catalog">Смотреть каталог</a>
    </div>
</section>

<section class="container" id="catalog">
    <h2 class="section-title">Каталог фильмов</h2>

    <form class="search" action="{{ route('home') }}" method="GET">
        <input
            type="text"
            name="search"
            value="{{ request('search') }}"
            placeholder="Поиск по названию фильма..."
        >

        <button type="submit">Найти</button>
    </form>

    @if(isset($movies) && $movies->count())
        <div class="movies">

            @foreach($movies as $movie)

                <a href="{{ route('movies.show', $movie->id) }}">

                    <div class="movie-card">

                        <div class="poster">
                            @if($movie->poster)
                                <img
                                    src="{{ $movie->poster }}"
                                    alt="{{ $movie->title }}"
                                    onerror="this.style.display='none'; this.parentElement.classList.add('poster-failed');"
                                >
                            @else
                                <span style="color:#aaa">Нет постера</span>
                            @endif
                        </div>

                        <div class="movie-info">
                            <h3>{{ $movie->title }}</h3>

                            <p>
                                {{ $movie->genre }} · {{ $movie->year }}
                            </p>

                            <p class="rating">
                                ★ {{ $movie->rating }}
                            </p>
                        </div>

                    </div>

                </a>

            @endforeach

        </div>
    @else
        <p class="empty">Фильмы пока не добавлены.</p>
    @endif

</section>

<footer>
    MovieHub &copy; {{ date('Y') }} — Мир кино
</footer>

</body>
</html>
