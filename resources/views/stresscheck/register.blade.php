@extends('stresscheck.template')

@section('content')

<div class="container-fluid">

    <div class="row m-3 custom-font-color">
        ユーザー登録すると、チェックした結果を記録できるようになります。
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

    <ul id="message_area" class="row m-3 custom-error-font-color"></ul>

    <form id="form" method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div class="row m-3">
            <label class="form-label custom-font-color" for="name">氏名（ニックネーム可）(*)</label>
            <input class="form-control" id="name" type="text" name="name" placeholder="元気" value="{{old('name')}}"
                required autofocus />
        </div>

        <!-- Email Address -->
        <div class="row m-3">
            <label class="form-label custom-font-color" for="email">e-Mail(*)</label>
            <input class="form-control" id="email" type="email" name="email" placeholder="name@example.com"
                value="{{old('email')}}" required autocomplete="username" />
        </div>

        <!-- 性別 -->
<!--
        <div class="row m-3">
            性別
            <fieldset id="gender" class="flex-container-class">
                <input type="radio" name="gender" value="male" id="male">
                <label class="flex-item-class flex-center-class custom-radio m-1" for="male">男性</label>
                <input type="radio" name="gender" value="female" id="female">
                <label class="flex-item-class flex-center-class custom-radio m-1" for="female">女性</label>
            </fieldset>
        </div>
-->

        <!-- 年代 -->
        <div class="row m-3">
            年代
            <fieldset id="generation" class="flex-container-class">
                <input type="radio" name="generation" value="10" id="generation_10">
                <label class="flex-item-class flex-center-class custom-radio m-1" for="generation_10">19才<br
                        class="d-sm-none" />以下</label>
                <input type="radio" name="generation" value="20" id="generation_20">
                <label class="flex-item-class flex-center-class custom-radio m-1" for="generation_20">20代</label>
                <input type="radio" name="generation" value="30" id="generation_30">
                <label class="flex-item-class flex-center-class custom-radio m-1" for="generation_30">30代</label>
                <input type="radio" name="generation" value="40" id="generation_40">
                <label class="flex-item-class flex-center-class custom-radio m-1" for="generation_40">40代</label>
                <input type="radio" name="generation" value="50" id="generation_50">
                <label class="flex-item-class flex-center-class custom-radio m-1" for="generation_50">50代</label>
                <input type="radio" name="generation" value="60" id="generation_60">
                <label class="flex-item-class flex-center-class custom-radio m-1" for="generation_60">60代</label>
                <input type="radio" name="generation" value="70" id="generation_70">
                <label class="flex-item-class flex-center-class custom-radio m-1" for="generation_70">70代</label>
                <input type="radio" name="generation" value="80" id="generation_80">
                <label class="flex-item-class flex-center-class custom-radio m-1" for="generation_80">80才<br
                        class="d-sm-none" />以上</label>
            </fieldset>
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
            <button class="col-4 btn btn-primary m-1 px-0 text-nowrap custom-main-button">登録</button>
        </div>

        <div class="row m-3">
            <div class="col text-end">
                @if (Route::has('stresscheck.login'))
                <a href="{{ route('stresscheck.login') }}">登録済の方は、こちらから</a><br />
                @endif
            </div>
        </div>
    </form>

</div>

<script>
    // 初期値の設定
    //StressCheck.selectRadio(document.getElementById('gender'), '{{old('gender')}}');
    StressCheck.selectRadio(document.getElementById('generation'), '{{old('generation')}}');

    var form = document.getElementById('form');
    form.addEventListener('submit', function (event) {
        var messageArea = document.getElementById('message_area');
        StressCheck.clearOrderdList(messageArea);

        var errorMessageList = [];
        // 入力値チェック
        //if(!StressCheck.isSelected(document.getElementById('gender'))) {
        //    errorMessageList.push('性別を選択してください。');
        //}
        if(!StressCheck.isSelected(document.getElementById('generation'))) {
            errorMessageList.push('年代を選択してください。');
        }

        if(errorMessageList.length > 0) {
            StressCheck.addOrderedList(messageArea, errorMessageList);
            window.scrollTo(0, 0);

            // 処理停止
            event.preventDefault();
        }
    });
</script>

@endsection