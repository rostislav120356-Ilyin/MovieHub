<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'NewsSite')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        * { box-sizing: border-box; }
        body { margin: 0; font-family: system-ui, Arial, sans-serif; background: #f5f6f8; color: #222; }
        .container { max-width: 1080px; margin: 0 auto; padding: 0 16px; }
        .site-header { background: #1f2a44; color: #fff; }
        .header-inner { display: flex; align-items: center; justify-content: space-between; gap: 16px; padding: 14px 0; }
        .logo { color: #fff; font-weight: 700; font-size: 20px; text-decoration: none; }
        .main-nav a, .auth-nav a { color: #fff; text-decoration: none; margin-right: 14px; }
        .main-nav a:hover, .auth-nav a:hover { text-decoration: underline; }
        .user-login { margin-right: 10px; opacity: .8; }
        .btn { display: inline-block; padding: 8px 14px; border-radius: 6px; font-size: 14px; text-decoration: none; cursor: pointer; border: 1px solid transparent; }
        .btn-primary { background: #ff6b35; color: #fff; }
        .btn-primary:hover { background: #ff5520; }
        .btn-outline { background: transparent; color: #fff; border-color: #fff; }
        .btn-outline:hover { background: rgba(255,255,255,.1); }
        .btn-light { background: #fff; color: #1f2a44; border-color: #ccd; }
        main { padding: 24px 0; }
        .grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 16px; }
        .card { background: #fff; border-radius: 10px; padding: 16px; box-shadow: 0 1px 4px rgba(0,0,0,.06); display: flex; flex-direction: column; }
        .card-category { font-size: 12px; color: #ff6b35; text-transform: uppercase; letter-spacing: .05em; margin-bottom: 6px; }
        .card-title { margin: 0 0 8px; font-size: 18px; }
        .card-excerpt { color: #555; font-size: 14px; flex: 1; }
        .card-meta { display: flex; justify-content: space-between; font-size: 12px; color: #888; margin-top: 12px; }
        .site-footer { background: #1f2a44; color: #cdd5e5; text-align: center; padding: 20px 0; margin-top: 40px; }
        .site-footer p { margin: 4px 0; }
        .alert { padding: 10px 14px; border-radius: 8px; margin-bottom: 16px; }
        .alert-success { background: #e6f4ea; color: #1e7e34; }
        .alert-error { background: #fbe9ea; color: #b02a37; }
        .form-box { background: #fff; max-width: 460px; margin: 0 auto; padding: 24px; border-radius: 12px; box-shadow: 0 2px 10px rgba(0,0,0,.06); }
        .form-box h1 { margin-top: 0; }
        .form-group { margin-bottom: 14px; }
        .form-group label { display: block; margin-bottom: 6px; font-weight: 600; font-size: 14px; }
        .form-group input, .form-group select, .form-group textarea {
            width: 100%; padding: 9px 11px; border: 1px solid #d3d7df; border-radius: 8px; font: inherit; background: #fff;
        }
        .form-group textarea { min-height: 180px; resize: vertical; }
        .errors { color: #b02a37; font-size: 13px; margin-top: 4px; }
        .section-head { display: flex; align-items: center; justify-content: space-between; margin-bottom: 18px; }
        .section-head h1 { margin: 0; }
        .empty { color: #777; padding: 40px 0; text-align: center; }
        .pagination-wrap { margin-top: 20px; }
        .cat-list { display: flex; flex-wrap: wrap; gap: 10px; margin-bottom: 20px; }
        .cat-chip { padding: 8px 14px; background: #fff; border-radius: 999px; color: #1f2a44; text-decoration: none; box-shadow: 0 1px 3px rgba(0,0,0,.08); }
        .cat-chip.active { background: #ff6b35; color: #fff; }
        .article-row { background: #fff; padding: 14px; border-radius: 10px; margin-bottom: 10px; display: flex; justify-content: space-between; gap: 12px; align-items: center; }
        .article-row small { color: #888; }
    </style>
</head>
<body>
    <x-header />

    <main>
        <div class="container">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if ($errors->any())
                <div class="alert alert-error">
                    <ul style="margin:0;padding-left:18px">
                        @foreach ($errors->all() as $e) <li>{{ $e }}</li> @endforeach
                    </ul>
                </div>
            @endif

            @yield('content')
        </div>
    </main>

    <x-footer />
</body>
</html>