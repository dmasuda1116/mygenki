@extends('stresscheck.template')

@section('content')

<div class="container-fluid">

    <!-- Session Status -->
    @if (session('status'))
    <div class="row m-3 custom-info-font-color">
        {{ session('status') }}
    </div>
    @endif

    <!-- Validation Errors -->
    @if ($errors->any())
    <ul class="row">
        @foreach ($errors->all() as $error)
        <li class="custom-error-font-color">{{ $error }}</li>
        @endforeach
    </ul>
    @endif

    <div class="row m-3 custom-font-color">
        ログインすると、以前に記録した履歴を参照することができます。
    </div>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div class="row m-3">
            <label class="form-label custom-font-color" for="email">e-Mail(*)</label>
            <input class="form-control" id="email" type="email" name="email" placeholder="name@example.com"
                value="{{old('email')}}" required autocomplete="username" />
        </div>

        <!-- Password -->
        <div class="row m-3">
            <label class="form-label custom-font-color" for="password">パスワード(*)</label>
            <input class="form-control" id="password" type="password" name="password" required
                autocomplete="current-password" />
        </div>

        <!-- Remember Me -->
        <!--
        <div class="row m-3">
            <label for="remember_me">
                <input id="remember_me" type="checkbox" name="remember">
                <label class="form-label custom-font-color" for="remember_me">入力した値を記憶する</label>
            </label>
        </div>
        -->

        <div class="row m-3 justify-content-end">
            <a id="return_top_button" class="col-4 btn btn-primary m-1 px-0 text-nowrap custom-button"
                href="{{ route('stresscheck.index') }}">トップへ<br class="d-sm-none" />戻る</a>
            <button class="col-4 btn btn-primary m-1 px-0 text-nowrap custom-main-button">ログイン</button>
        </div>

        <div class="row m-3">
            <div class="col text-end">
                @if (Route::has('stresscheck.forgot-password'))
                <a href="{{ route('stresscheck.forgot-password') }}"> パスワードを忘れた方は、こちら </a><br />
                @endif
            </div>
        </div>
    </form>

</div>

@endsection