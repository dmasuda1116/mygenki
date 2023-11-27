<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="generator" content="">

    <title>{{ config('app.name') }}</title>

    <!-- CSS -->
    @if(app('env') === 'local')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/Chart.css') }}">
    <!-- カスタマイズCSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/custom.css') }}">
    @endif
    @if(app('env') === 'production')
    <link rel="stylesheet" type="text/css" href="{{ secure_asset('css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ secure_asset('css/Chart.css') }}">
    <!-- カスタマイズCSS -->
    <link rel="stylesheet" type="text/css" href="{{ secure_asset('css/custom.css') }}">
    @endif

    <!-- JavaScript -->
    @if(app('env') === 'local')
    <script type="text/javascript" src="{{ asset('js/bootstrap.bundle.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/Chart.bundle.js') }}"></script>
    <!-- カスタマイズJavaScript -->
    <script type="text/javascript" src="{{ asset('js/custom.js') }}"></script>
    @endif
    @if(app('env') === 'production')
    <script type="text/javascript" src="{{ secure_asset('js/bootstrap.bundle.js') }}"></script>
    <script type="text/javascript" src="{{ secure_asset('js/Chart.bundle.js') }}"></script>
    <!-- カスタマイズJavaScript -->
    <script type="text/javascript" src="{{ secure_asset('js/custom.js') }}"></script>
    @endif

    <!-- Debug -->
    @if(app('env') === 'local')
    <script type="text/javascript">
        // ログイン状態
        console.log('Login:[{!! ((Auth::check())? 'true':'false') !!}], ID:[{!! Auth::id() !!}], User:[{!! ((Auth::user())? Auth::user()->name: 'None') !!}]');
        // セッション情報
        console.log({!! json_encode(Session::all()) !!});
    </script>
    @endif

</head>

<body class="custom-background-color">
    <!-- ナビゲーション -->
    <nav class="navbar navbar-expand sticky-top custom-item-sub-color d-print p-0" role="navigation">
        <div class="container-fluid">
            <div class="navbar-brand mx-3 custom-font-color">{{ config('app.name') }}</div>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto">
                    <!-- ログイン状態 -->
                    @auth
                    <span class="navbar-text custom-font-color">[{{ Auth::user()->name }}]さん</span>
                    @else
                    <span class="navbar-text custom-font-color">[ゲスト]さん</span>
                    @endauth

                    <!-- ドロップダウン -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle custom-font-color" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false" data-bs-display="static">
                            【メニュー】
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <!-- 共通メニュー -->
                            @if (Route::has('stresscheck.index'))
                            <li><a class="dropdown-item custom-font-color"
                                    href="{{ route('stresscheck.index') }}">トップへ戻る</a></li>
                            @endif

                            @if (Route::has('stresscheck.check'))
                            <li><a class="dropdown-item custom-font-color"
                                    href="{{ route('stresscheck.check') }}">チェックを開始する</a></li>
                            @endif

                            <hr class="custom-line-color m-0" />

                            @auth
                            <!-- ログインユーザー -->
                            @if (Route::has('stresscheck.result'))
                            <li><a class="dropdown-item custom-font-color"
                                    href="{{ route('stresscheck.result') }}">結果を表示する</a>
                            </li>
                            @endif
                            @if (Route::has('stresscheck.record'))
                            <li><a class="dropdown-item custom-font-color"
                                    href="{{ route('stresscheck.record') }}">記録を確認する</a>
                            </li>
                            @endif
                            @if (Route::has('stresscheck.profile'))
                            <li><a class="dropdown-item custom-font-color"
                                    href="{{ route('stresscheck.profile') }}">登録情報</a>
                            </li>
                            @endif
                            @if (Route::has('stresscheck.logout'))
                            <li><a class="dropdown-item custom-font-color"
                                    href="{{ route('stresscheck.logout') }}">ログアウト</a></li>
                            @endif

                            <!-- 管理者用画面 -->
                            @if (Auth::user()->isAdmin())
                            @if (Route::has('stresscheck.admin'))
                            <hr class="custom-line-color m-0" />
                            <li><a class="dropdown-item custom-font-color"
                                    href="{{ route('stresscheck.admin') }}">管理者用画面</a></li>
                            @endif
                            @endif

                            @else
                            <!-- ゲストユーザー -->
                            @if (Route::has('stresscheck.login'))
                            <li><a class="dropdown-item custom-font-color"
                                    href="{{ route('stresscheck.login') }}">ログイン</a></li>
                            @endif
                            @if (Route::has('stresscheck.register'))
                            <li><a class="dropdown-item custom-font-color"
                                    href="{{ route('stresscheck.register') }}">ユーザー登録</a></li>
                            @endif

                            @endauth
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- メイン -->
    <main>
        @yield('content')
    </main>
</body>

</html>