
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Регистрация — MovieHub</title>
    <style>
        * { box-sizing: border-box; }
        body {
            margin: 0;
            background: #101116;
            color: white;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .form-box {
            width: 90%;
            max-width: 420px;
            background: #1b1c24;
            padding: 35px;
            border-radius: 15px;
            border: 1px solid #30313b;
        }
        .logo {
            text-align: center;
            color: #e5093c;
            font-size: 30px;
            font-weight: bold;
            margin-bottom: 25px;
        }
        h2 { text-align: center; margin-bottom: 25px; }
        input {
            width: 100%;
            padding: 13px;
            margin: 9px 0;
            border: 1px solid #393a45;
            border-radius: 7px;
            background: #101116;
            color: white;
        }
        button {
            width: 100%;
            padding: 14px;
            margin-top: 15px;
            border: 0;
            border-radius: 7px;
            background: #e5093c;
            color: white;
            font-weight: bold;
            cursor: pointer;
        }
        a { color: #e5093c; text-decoration: none; }
        .bottom { text-align: center; margin-top: 20px; color: #aaa; }
        .error { color: #ff7777; font-size: 13px; }
        .errors { color: #ff7777; margin-bottom: 15px; }
    </style>
</head>
<body>

<div class="form-box">
    <div class="logo">MovieHub</div>
    <h2>Создать аккаунт</h2>

    @if($errors->any())
        <div class="errors">
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form action="{{ route('register.store') }}" method="POST">
        @csrf

        <input
            type="text"
            name="name"
            placeholder="Ваше имя"
            value="{{ old('name') }}"
            required
        >

        <input
            type="email"
            name="email"
            placeholder="Электронная почта"
            value="{{ old('email') }}"
            required
        >

        <input
            type="password"
            name="password"
            placeholder="Пароль (минимум 6 символов)"
            required
        >

        <input
            type="password"
            name="password_confirmation"
            placeholder="Повторите пароль"
            required
        >

        <button type="submit">Зарегистрироваться</button>
    </form>

    <div class="bottom">
        Уже есть аккаунт?
        <a href="{{ route('login') }}">Войти</a>
        <p><a href="{{ route('home') }}">Вернуться на главную</a></p>
    </div>
</div>

</body>
</html>
