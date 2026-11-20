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
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #f1f5f9;
            font-family: Arial, sans-serif;
        }

        .container {
            width: 90%;
            max-width: 650px;
            padding: 45px 30px;
            text-align: center;
            background: white;
            border-radius: 14px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
        }

        h1 {
            color: #1e293b;
            font-size: 36px;
            margin-bottom: 15px;
        }

        p {
            color: #64748b;
            margin-bottom: 30px;
            line-height: 1.6;
        }

        .buttons {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 15px;
        }

        .btn {
            display: inline-block;
            padding: 13px 22px;
            border-radius: 7px;
            color: white;
            text-decoration: none;
            font-weight: bold;
            transition: 0.2s;
        }

        .blue {
            background: #2563eb;
        }

        .blue:hover {
            background: #1d4ed8;
        }

        .green {
            background: #16a34a;
        }

        .green:hover {
            background: #15803d;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Добро пожаловать!</h1>

        <p>Это главная страница вашего новостного портала.</p>

        <div class="buttons">
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}" class="btn blue">
                        Перейти в личный кабинет
                    </a>
                @else
                    <a href="{{ route('login') }}" class="btn blue">
                        Войти
                    </a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="btn green">
                            Зарегистрироваться
                        </a>
                    @endif
                @endauth
            @endif
        </div>
    </div>
</body>
</html>