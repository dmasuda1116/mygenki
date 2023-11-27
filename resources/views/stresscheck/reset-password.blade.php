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
        パスワードをリセットします。<br />
        新しいパスワードを入力してください。
    </div>

    <form method="POST" action="{{ route('password.update') }}">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div class="row m-3">
            <label class="form-label custom-font-color" for="email">e-Mail(*)</label>
            <input class="form-control" id="email" type="email" name="email" placeholder="name@example.com"
                value="{{old('email', $request->email)}}" required autocomplete="username" />
        </div>

        <!-- Password -->
        <div class="row m-3">
            <label class="form-label custom-font-color" for="password">パスワード(*)</label>
            <input class="form-control" id="password" type="password" name="password" required
                autocomplete="new-password" />
        </div>

        <!-- Confirm Password -->
        <div class="row m-3">
            <label class="form-label custom-font-color" for="password_confirmation">パスワード確認(*)</label>
            <input class="form-control" id="password_confirmation" type="password" name="password_confirmation" required
                autocomplete="new-password" />
        </div>

        <div class="row m-3 justify-content-end">
            <a id="return_top_button" class="col-4 btn btn-primary m-1 px-0 text-nowrap custom-button"
                href="{{ route('stresscheck.index') }}">トップへ<br class="d-sm-none" />戻る</a>
            <button class="col-4 btn btn-primary m-1 px-0 text-nowrap custom-main-button">リセット</button>
        </div>
    </form>
</div>

@endsection