@extends('stresscheck.template')

@section('content')

<div class="container-fluid">

    <div class="row m-3 custom-font-color">
        メールアドレスを入力してください。<br />
        パスワードをリセットするためのメールを送信します。<br />
        メールが届きましたら、この画面を閉じてください。<br />
        メールの文面の[リセットパスワード]ボタンをクリックすると、ログイン画面が表示されます。
    </div>

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

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div class="row m-3">
            <label class="form-label custom-font-color" for="email">e-Mail(*)</label>
            <input class="form-control" id="email" type="email" name="email" placeholder="name@example.com"
                value="{{old('email')}}" required autocomplete="username" />
        </div>

        <div class="row m-3 justify-content-end">
            <a id="return_top_button" class="col-4 btn btn-primary m-1 px-0 text-nowrap custom-button"
                href="{{ route('stresscheck.index') }}">トップへ<br class="d-sm-none" />戻る</a>
            <button class="col-4 btn btn-primary m-1 px-0 text-nowrap custom-main-button">リセットメールを<br
                    class="d-sm-none" />送信</button>

        </div>
    </form>
</div>

@endsection