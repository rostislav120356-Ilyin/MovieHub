<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $movie->title }} — MovieHub</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: #101116;
            color: white;
            font-family: Arial, sans-serif;
        }

        header {
            background: #17181f;
            padding: 22px 7%;
            border-bottom: 1px solid #292a33;
        }

        .logo {
            color: #e5093c;
            font-size: 27px;
            font-weight: bold;
        }

        .container {
            width: 86%;
            margin: 40px auto;
        }

        .back {
            display: inline-block;
            color: #e5093c;
            text-decoration: none;
            margin-bottom: 30px;
        }

        h1 {
            font-size: 38px;
            margin-bottom: 15px;
        }

        .info {
            color: #aaa;
            margin-bottom: 15px;
        }

        .rating {
            color: #ffc107;
            margin-bottom: 20px;
        }

        .description {
            color: #ccc;
            line-height: 1.7;
            margin-bottom: 35px;
        }

        .trailer-title {
            font-size: 27px;
            margin-bottom: 20px;
        }

        .trailer {
            width: 100%;
            aspect-ratio: 16 / 9;
            background: #000;
            border-radius: 15px;
            overflow: hidden;
        }

        .trailer iframe {
            width: 100%;
            height: 100%;
            border: none;
        }

        .no-trailer {
            background: #1b1c24;
            padding: 30px;
            border-radius: 12px;
            color: #aaa;
        }

        footer {
            margin-top: 60px;
            padding: 30px;
            text-align: center;
            color: #777;
        }
    </style>
</head>

<body>

<header>
    <div class="logo">MovieHub</div>
</header>

<div class="container">

    <a href="{{ route('home') }}" class="back">
        ← Вернуться к фильмам
    </a>

    <h1>{{ $movie->title }}</h1>

    <p class="info">
        {{ $movie->genre }} · {{ $movie->year }}
    </p>

    <p class="rating">
        ★ {{ $movie->rating }}
    </p>

    <p class="description">
        {{ $movie->description }}
    </p>

    @php
        $youtubeId = null;

        if ($movie->watch_url) {
            preg_match(
                '~(?:youtube\.com/(?:watch\?.*v=|embed/|shorts/)|youtu\.be/)([A-Za-z0-9_-]{11})~',
                $movie->watch_url,
                $matches
            );

            $youtubeId = $matches[1] ?? null;
        }
    @endphp

    <h2 class="trailer-title">Трейлер фильма</h2>

    @if($youtubeId)

        <div class="trailer">
            <iframe
                src="https://www.youtube-nocookie.com/embed/{{ $youtubeId }}"
                title="Трейлер {{ $movie->title }}"
                allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture; web-share"
                allowfullscreen>
            </iframe>
        </div>

    @else

        <div class="no-trailer">
            Трейлер этого фильма пока не добавлен.
        </div>

    @endif

</div>

<footer>
    MovieHub © {{ date('Y') }} — Мир кино
</footer>

</body>
</html>