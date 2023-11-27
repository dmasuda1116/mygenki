@extends('stresscheck.template')

@section('content')

<div class="container-fluid">
    <div class="row my-3">
        <h1 class="col text-center custom-font-color">「{{ config('app.name') }}」で<br />
        こころの健康チェック</h1>
    </div>

    <div class="row my-1">
        <hr class="custom-line-color" />
    </div>

    <div class="row justify-content-center">
        <a class="col-4 btn btn-primary custom-main-button" href="{{ route('stresscheck.check') }}">ここをクリック!<br
                class="d-sm-none" />チェックを開始する</a>
    </div>

    <div class="row my-1">
        <hr class="custom-line-color" />
    </div>

    <div class="row">
        <div clsss="col">
            <p class="custom-font-color">
                アカウントをお持ちの方は、以下よりログインしてください。結果がグラフ化され、元気の推移が見える化されます。無料です。<br class="d-sm-none" />
            </p>
        </div>
    </div>

    <!-- Session Status -->
    @if (session('status'))
    <div class="row">
        <div class="col custom-info-font-color">
            {{ session('status') }}
        </div>
    </div>
    @endif

    <!-- Validation Errors -->
    @if ($errors->any())
    <div class="row">
        <ul class="col">
            @foreach ($errors->all() as $error)
            <li class="custom-error-font-color">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div class="row my-3">
            <div class="col">
                <label class="form-label custom-font-color" for="email">e-Mail(*)</label>
                <input class="form-control" id="email" type="email" name="email" placeholder="name@example.com"
                    value="{{old('email')}}" required autocomplete="username" />
            </div>
        </div>

        <!-- Password -->
        <div class="row my-3">
            <div class="col">
                <label class="form-label custom-font-color" for="password">パスワード(*)</label>
                <input class="form-control" id="password" type="password" name="password" required
                    autocomplete="current-password" />
            </div>
        </div>

        <div class="row my-3 justify-content-end">
            <div class="col-4">
                <button type="submit" class="btn btn-primary custom-button w-100 h-100">ログイン</button>
            </div>
        </div>
    </form>

    @if(!Auth::check())
    <div class="row my-3">
        <div class="col">
            <div class="col text-end">
                @if (Route::has('stresscheck.forgot-password'))
                <a href="{{ route('stresscheck.forgot-password') }}">パスワードを忘れた方は、こちら</a><br />
                @endif
            </div>
        </div>
    </div>
    @endif

    <div class="row my-1">
        <hr class="custom-line-color" />
    </div>

    <div class="row">
        <div class="col">
            <p class="custom-font-color">
                <div style="text-align:center">
                    <div class="fs-5 fw-bold mt-4">
                    ～ごあいさつ～<br />
                    </div>
                もっと元気に仕事をしたい。大切な人の健康を守りたい。<br />
                リーダーのあなたが知っておくべき<br />
                「８つの元気レベル」<br />
            </p>

            <p class="custom-font-color">
                どんなメンタルレベルでも”自分も大切な人も”<br />
                元気にする方法を見つけることができる<br />
                「こころの健康づくりの決定版！」<br />
                    <div style="text-align:center">         
                        <div class="fs-5 fw-bold mt-4">
                わかる！はかれる！見つけられる！<br />
                メンタル・チェックシステム<br />
                『マイ元気』<br />                
                        </div>
                    </div>
                </div>
            </p>
                こんにちは、ファインドヘルスの吉田貴芳と申します。<br />
                このたびは、私たちの「メンタル・チェックシステム『マイ元気』」にアクセスしていただき、誠にありがとうございます。<br />
                <br />
                私たちファインドヘルスは、中小企業様向けに、人財育成・支援のメンタルサービスをご提供しています。<br />
                <br />
            <p class="custom-font-color">
                <div class="fs-5 fw-bold mt-4">
                こんな悩みをお持ちではないですか？
                </div>
                <ul>
                    <li class="custom-font-color">コロナというストレスにいい加減、疲れてきた</li>
                    <li class="custom-font-color">三密対策やテレワークで、コミュニケーションがとりづらくなった</li>
                    <li class="custom-font-color">あらたな常識や、多様な価値感で、こころを合わせるのが難しくなってきた</li>
                    <li class="custom-font-color">変化のスピードに会社も社員もついていくのに必死で、ゆとりがない</li>
                    <li class="custom-font-color">何が起きるか予測がつかない、これからどんな経営・働き方をしたらいいのか</li>
                </ul>
            </p>
                <br />
                世の中が複雑に変わっていくなかで、自分のこころも変化に適応させていかねばなりません。
                <br />
                このような大転換期を元気に乗りきっていくには、一人ひとりが「こころの健康」を自らでマネジメントしていく能力が必要です。<br />
                <br />                
                なぜなら、急な変化や見通しがもちづらいゆえに、心身のバランスをくずしたり、目指す方向を見失ったり、相手を理解しづらくなるという状況が起きやすいからです。<br />
                <br />
                そこで今回、本システム『マイ元気』を「無料」でご提供いたします。<br />
                <br />
                <div class="fs-5 fw-bold mt-4">
                『マイ元気』をご活用するメリット<br />
                </div>
                具体的に、次の５つがわかります。<br />
                １.いまの元気レベルが「8段階」でわかります！<br />
                　「病～ピンチ～ストレス～健康～夢実現」までを網羅<br />
                　<br />
                ２.解決策の「ヒント」がわかります！<br />
                　8段階別に、状態理解・改善ポイント・コラムで解説<br />
                　<br />
                ３.元気の推移が「一目で」わかります！<br />
                　診断結果が保存でき、その記録を時系列でグラフ化<br />
                　<br />
                ４.自分だけでなく「他人」の元気もわかります！<br />
                　自己理解を深めるほど、他者理解が促進<br />
                　<br />
                ５.スマホがあれば「２分」でわかります！<br />
                　毎日の元気チェックが、かんたんにできる仕様<br />
                　
                <br />
                    <div class="fs-5 fw-bold mt-4">
                『マイ元気』の特徴と目的<br />
                    </div>
                『マイ元気』のメンタル・チェックシステムは、一般的に使われている『ストレス・チェック』とは異なり、「ストレスを測る」ものでも、「うつ傾向を見つけるもの」ではありません。<br />
                <br/>
                『マイ元気』では、ストレスが高くても、うつであっても、またその逆に、元気いっぱいな状態であっても、ご活用していただけます。<br />
                <br />
                『マイ元気』では、こころの状態がマイナス・プラスに関わらず、どんなこころの状態にあっても、本当に理想とする方向に向かっているのかを、自らでチェック（＝確認）&軌道修正することを目的としています。<br />
                <br />
                『マイ元気』をもっとも活用していただきたいのは、みんなと元気に働きたいと思っている”仲間意識が高いリーダー”の方です。<br />
                なぜなら、セルフ・マネジメント能力が高くなるほど、他者に対してのマネジメント能力もアップするからです。<br />
                <br />
                
                    <div class="fs-5 fw-bold mt-4">
                『マイ元気』を「無料」でご提供する理由<br />
                </div>
                私たちの「メンタル・チェックシステム『マイ元気』」のご利用は、「無料」でご提供させていただきます。<br />
                <br />
                なぜならば、「日本をもっと元気にしたい！」という想いだからです。<br />
                日本とは、私にとって最も大切な場所であり、大切な人たちと一緒に暮らしている場所であり、この先も物心ともに豊かに繁栄してほしいと切望しています。<br />
                <br />
                でも、コロナによって、その日本が少し元気がないように感じ始めた時、あるポスターが私の目にとまりました。<br />
                <br />
                「食糧支援」<br />
                私が住んでいる自治体の掲示板に、食べ物が不足して困っている方に向けたご案内でした。<br />
                <br />
                そこで私も自分ができる事は何かと考えました。<br />
                「心理支援」<br />
                <br />
                1人でも元気に働く大人が増えることにより、子どもたちは未来に希望をもてるようになり、お年寄りはより安心できる生活を送っている。<br />
                <br />
                コロナであっても、少子高齢化の社会を誰もが自分らしく、ふつうに元気を出して、幸せな生活をおくれているような、成熟感のある日本へ。<br />
                「働く喜びをみんながわかちあっている！」<br />
                <br />
                そんな私の想いにご賛同者が現れて、『マイ元気』プロジェクトがスタート。<br />
                半年間の共同開発を経て、このようにあなたに届けられるまでにいたりました。<br />
                <br />
                
                <div class="fs-5 fw-bold mt-4">
                『マイ元気』を通じた願い<br />
                </div>
                ここまでご覧くださり、ありがとうございます。<br />
                せっかくのご縁です。<br />
                ぜひあなたに使っていただき、より元気になっていただきければ、これ以上の幸せはありません。<br />
                <br />
                こころの専門家となって18年、たくさんの方々に支えていただいていたご恩を、少しですがお返しさせていただけるような想いです。<br />
                <br />
                そしてよろしければ、あなたの大切な人にも『マイ元気』をお知らせください。ともに元気の輪を広げていきませんか。<br />
                <br />
                もっとも大切な人と、もっと安心・元気・支え合いの輪が広がっている日本社会の実現を願って。<br />
                                
                <br />
                2021年7月7日<br />
                『マイ元気』<br />
                プロジェクト・リーダー　吉田貴芳
                <br />
                <br />
                    <div style="text-align:center">
                    © 2021 Find Health
                    </div>
        </div>
    </div>    
</div>

@endsection