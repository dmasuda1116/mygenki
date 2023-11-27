@extends('stresscheck.template')

@section('content')

<div class="container-fluid">

    <div class="row">
        <div class="col text-center custom-font-color fw-bold fs-2 mt-3">        
            <div style="color:#31B56A;">               
                「元気レベル」は ８段階
            </div>
        </div>
    </div>

    <div class="row">
        <div calss="col">
            <!-- わるい～よいの８段階表示欄 -->
            <x-custom-header-table :level="$result['level']" />
        </div>
    </div>

    <div class="row fw-bold">
        <div calss="col">
            <p class="custom-font-color">
                <div style="color:#5E7184;">
                より良い人生を歩むには、主体性を発揮する習慣が必要。<br />
                （スティーブン・R・コビー）
                </div>
            </p>

            <div class="custom-font-color fw-bold fs-6 mt-5">
                <div style="color:#5E7184;">
                    【いまの元気レベルは？】
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <!-- ラベル -->
            <x-custom-label class="custom-level{{ $result['level'] }}-label">
                ４元気＝『がんばれ元気』
            </x-custom-label>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <p>
                <ul>
                    <li class="custom-font-color">問題はわかっていて、同じことで困ることがある。</li>
                    <li class="custom-font-color">体の調子はいまいち、不快な症状を感じる。</li>
                    <li class="custom-font-color">こころの天気は「小雨」、気持ちに余裕がなく短気。</li>
                    <li class="custom-font-color">行動パターンがわかると、問題は減っていく。</li>
                    <li class="custom-font-color">感情的になったら行動せず、一時停止しましょう。</li><br>
                </ul>
            </p>
                       
            <div class="custom-font-color fw-bold fs-6 mt-5">
                <div style="color:#5E7184;">
                    【４元気のときには？】
                </div>
            </div>
        </div>
    </div>


    <div class="row mb-3">
        <div class="col">
            <!-- ラベル -->
            <x-custom-label class="custom-level{{ $result['level'] }}-label">
                状態の理解・対応のポイント
            </x-custom-label>
        </div>
    </div>

            <div class="custom-font-color fs-6 fw-bold">
                <div style="color:#5E7184; text-align:center">
                    Q.<u>いろいろと問題が起きるのはなぜだろう？<br /></u>
                </div>
                <div style="text-align:center">
                   👇<br />
                </div>
                <div style="color:#31B56A; text-align:center">
                    A.<u>問題と真正面から向きあう！</u><br />
                </div>
                
            </div>
            
    <div class="row mt-3">
        <div class="col">
            <!-- テーブル表示欄 -->
            <x-custom-detail-table :level="$result['level']" />
        </div>
    </div>

    <div class="row">
        <div class="col">
           <p class="custom-font-color">
               <div style="color:#5E7184; text-align:center">
                   <div class="fs-5 fw-bold ">
		           ～『４元気』の状態の理解～
		           </div>
		           
		           <div style="text-align:center">
                   👇<br />
                   </div>
               <div class="fw-bold">    
                   <div style="color:#31B56A; text-align:center">
                        <u>テーマは、「スランプ」</u><br />
                   </div>
               </div>		           
		       
               </div>
                   <div class="fw-bold mt-2">
                       <div style="color:#31B56A;">
                          【問題の中身】<br />
                       </div>
                   </div>
                ミスやトラブルなどが続き、それらの対処でやることが増え、時間や余裕がどんどんなくなっていく。<br />
                気分転換をはかってもスッキリせず、気になることが頭から離れてくれないほど、潜んでいた問題がハッキリしてくる。<br />
                他力本願での問題解決が期待できないような問題が多発したり、追いかけてくるのはなぜでしょう。<br />
                問題という殻のなかに、大事な何かがうまっているようなことはないでしょうか。問題としっかり向き合うことが必要なときなのかもしれません。<br />
                問題の殻を破ることができれば、その中にある成長という宝物と出会えるはず。
                <br />
                <br />
               <div style="color:#5E7184; text-align:center">
                   <div class="fs-5 fw-bold mt-4">
                   ～『４元気』の対応のポイント～
                   </div>
                   
                   <div style="text-align:center">
                    👇<br />
                   </div>
               <div class="fw-bold">
                   <div style="color:#31B56A; text-align:center">
                       <u>ターゲットは、「行動」</u><br />
                   </div>
               </div>

                   
               </div>
                   <div class="fw-bold mt-2">
                       <div style="color:#31B56A;">
                           【腹をくくって問題と向き合おう】<br />
                       </div>
                   </div>

               <div class="fw-bold">
                  <u>〇 大事なことほどめんどくさい<br /></u>
               </div>
                
                     あわただしく毎日を送っていると、大事なことほど後回しになりがちに。でも、緊急な事ばかり優先していると、気づけば重要な問題が山積みになるので要注意。<br />
                <br />
               <div class="fw-bold">
                <u>〇 気分に流されない<br /></u>
               </div>
                     やることがたくさん増えるときは、心の余裕がなくなってきますよね。その余裕がなくなるほど、感情的に反応しやすくなります。一呼吸で一時停止してから言動に移しましょう。<br />
                <br />
                <div class="fw-bold">
                <u>〇 私は自分で選択する<br /></u>
                </div>
                     自分の身に起きる問題、だれが解決するのでしょう？待っていたり、誰かを批判して、時間とエネルギーを注ぐよりも、自分は何ができるのかを選択することで、解決できる領域もあるはず。<br />
                <br />
                <div style="color:#5E7184; text-align:center">
                    <div class="fs-5 fw-bold mt-4">
                ～～～『４元気』のまとめ～～～<br />
                    </div>
                </div>
                    「いつも同じことで悩まされる・・・」と、問題から逃れられない、追いかけてくるという状態が続けば、もうそれは、問題と向き合うときですよね。<br/>
                    「わかってる、わかってる（けど、対応できていない）」、「めんどくさいなあ～」と思うことは、大事なことを知らせてくれているサイン。<br/>
                   問題に主導権を与えず自ら主体的になって、問題を解決しようと選択していくなかに、成長・達成・喜びというごほうびが待っている。<br/>
                   大事なことを後回しせず、優先していくためには、気分に流されず腰を据えた対応が必要。
            </p>
            <br/>

        </div>
    </div>

    <div class="row mb-3">
        <div class="col">
           <div class="custom-font-color fw-bold fs-6 mt-5">
                <div style="color:#5E7184;">
                    【いまのテーマはどこでしょう？】
                </div>
           </div>
            <!-- ラベル -->
            <x-custom-label class="custom-level{{ $result['level'] }}-label">
                元気バランスの分析結果
            </x-custom-label>
        </div>
    </div>

    <div class="row">
        <div class="col text-center custom-font-color">
            元気バランスの４要素
        </div>
    </div>
    <div class="row">
        <div class="col border border-secondary chart-container mx-1"
            style="position: relative; width: 100vw; height:400px;">
            <!-- レーダーチャート -->
            <x-custom-radar-chart :data="$result" />
        </div>
    </div>

    <div class="row">
        <div class="col">
            <p class="custom-font-color">
               <div class="custom-font-color fw-bold fs-6 text-center">
                   <div style="color:#31B56A;">
                      【元気バランスの４要素を見なおしてみましょう。】<br />
                   </div>
               </div>
               <div class="custom-font-color fw-bold fs-6">
                   心理（こだわりなく、明るくいられている状態）<br />
               </div>
                　⇒イライラ・落ち込み・グチ・不安・不満・思考など<br />
                　　<u>「どんな時にイヤな感情になっていますか？」<br /></u>
                <br />
                <div class="custom-font-color fw-bold fs-6">
                身体（気になる所がなく、軽快に動けている状態）<br />
                 </div>
                　⇒痛み・疲労・睡眠・運動・食欲・体重・便秘など<br />
                　　<u>「いま、一番、気になるところは？」<br /></u>
                <br />
                 <div class="custom-font-color fw-bold fs-6">
                生活（意義を見出し、主体的に選択している状態）<br />
               </div>
                　⇒夢・感謝・くつろぎ・思いやり・主体性・楽しみなど<br />
                　　<u>「何をしている時、幸せを感じますか？」</u><br />
                <br />
                 <div class="custom-font-color fw-bold fs-6">
                社会（他者とのつながりを大切にしている状態）<br />
               </div>
                　⇒人・家族・職場・社会・自分とのつながりを<br />
                　　<u>「今、誰とどんな風につながれたらいいですか？」</u><br />
            </p>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="custom-font-color fw-bold fs-6 mt-5">
                <div style="color:#5E7184;">
                    【Let's　セルフ・コーチング！】
                </div>        
            </div>

            <!-- ラベル -->
            <x-custom-label class="custom-level{{ $result['level'] }}-label">
                元気を見つける３つの問い
            </x-custom-label>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <p class="custom-font-color">
                <ol>
                    <li class="custom-font-color">いま、めんどくさいなあ、と思うようなこと３つあげるとすれば？</li>
                    ☛「<u>　　　　　　　　　　　　　　　　</u>」</br></br>
                    <li class="custom-font-color">どの問題が、一番に解決したらいいですか？</li>
                    ☛ 「<u>　　　　　　　　　　　　　　　　</u>」</br></br>
                    <li class="custom-font-color">その問題を解決させるために、Googleで検索するとすれば、どんなキーワード？</li>
                    ☛「<u>　　　　　　　　　　　　　　　　</u>」</br></br>
                </ol>
            </p>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="custom-font-color fw-bold fs-6 mt-5">
              <div style="color:#5E7184;">
                【もうちょっと知りたいときは】
              </div>
            </div>
        </div>
    </div>

    <div class="row" id="detail">
        <div class="col">
            <!-- ラベル -->
            <x-custom-label class="custom-level{{ $result['level'] }}-label">
                『４元気』のときの<br class="d-sm-none" />メッセージ・コラム☟
            </x-custom-label>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <p class="custom-font-color">
               <div class="custom-font-color fw-bold fs-5 text-center">
                   <div style="color:#31B56A;">
                    ～大切なことほどめんどうくさい～
                   </div>
               </div>
               いま、あなたを困らせていること、どんなことが起こっていますか？<br />
               <br />
               例えば、<br />
               人前で話すことが苦手なのに、スピーチをよく求められたり、<br />
               忙しいときにかぎって、幹事をお願いされたり、<br />
               以前から依頼を受けていた仕事なのに、ぜんぜん取り組んでいなかったり、<br />
               久しぶりのデート、早く帰宅しようと思っていたら、ミスが判明して残業になったり、<br />
               健康診断で生活習慣の改善指導があったのに、気づけば一年なにもしていなかったり、<br />
               <br />
               このように、気づけばいつも緊急の問題に追われ、バタバタしている状況になっていませんか。<br />
               あるいは、いま起きている問題の中で、これまでにも同じようなお悩みを抱えていたことはありませんか？<br />
               <br />
               上記の例えは、いずれも私が体験した失敗談です。<br />
               なんとなくできるだろうと準備せずに本番を迎えたり、出来事が起きたときすぐにやらず先送りしたり、緊急の問題が解決したらふりかえりをしないからまた同じような問題が繰り返されたり・・・などなど。<br />
               <br />
               起きる出来事としっかり向き合わなければ、いつも緊急なことをしのぐだけになっていて、問題が解決すれば、安心感から一息入れたくなり、なんとくそれで満足してしまう。<br />
               <br />
               でも、その緊急対応をふりかえらない限りは、問題の本質は変わらないので、バタバタ貧乏な状態がつづいてしまいます。<br />
               <br />
               この状態から抜け出すには、緊急対応に終わらせず、重要なことを明確にして、重要なことを日ごろから優先させることが必要でしょう。<br />
               なぜなら、重要なことをはっきりさせておかないと、とりかえしのつかない問題にふくらんで、後悔がつのっていくことになりかねません。<br />
               <br />
               仕事も、人づきあいも、子育ても、家族関係も、健康も、お金も、親孝行も。<br />
               <br />
               ～あのときやっておけばよかった～<br />
               「後悔先に立たず」<br />
               「無我夢中に急いで結婚するから一生悔いることになる」<br />
               「家庭の失敗は仕事で補えない」<br />
               「親孝行したくても親はなし」<br />
               「時は得難い安くて失いやすい」<br />
               <br />
               少しでも後悔しないような生き方を目指したい。<br />
               どうすればいいか？<br />
               <br />
               その答えをもっているのは、自分自身。<br />
               <br />
               でも、その答えのありかは、意識して見つけにいかないと、姿をあらわしてくれません。<br />
               日常はあわただしく過ぎますし、世の中はたくさんの情報にあふれているし、自分の感情はその時々でコロコロ変わります。<br />
               <br />
               大切なことほど、めんどうくさい。<br />
               重要なことは、ついつい後回しになりがちになりませんか？<br />
               <br />
               でも、重要なことを意識する習慣を持たなければ、日々の緊急なことに流されてしまう生き方になってしまいます。<br />
               そして、失ってその大きさに気づくという後悔。<br />
               <br />
               あなたにとって今、重要なことはなんでしょうか？<br />
               もし、いつも同じような問題に悩まされていることがあるのなら、そこにこそあなたにとってもっとも重要な答えがあるのではないでしょうか。<br />
               <br />
               なぜなら、多くのことを気づかせていただく機会になるからです。<br />
               問題は解決できることに越したことがありませんが、それだけではなく問題をきっかけに重要なことがわかる機会とも言えます。<br />
               <br />
               いまあなたに起きている問題、繰り返し起きる問題は、自分に何を伝えようとしているでしょう？<br />
               問題を見過ごすこともできるかもしれませんが、問題を自分ごととして主体的に引き受けることもできる。<br />
               <br />
               主体的な人は、自分の責任として事態を引き受け、望む状態を自らでつくりあげいく。<br />
               責任は英語で、Responsibirity。<br />
               <br />
               この字を分解すると、Response＝反応　＋　Ability＝能力<br />
               主体性のある人は、起きるできごとに対する反応を、自ら選択する能力が高い人。<br />
               <br />
               誰かにまかせず、情報に流されず、感情的に反応せず、自分にとって最も重要なことを選択して、自らの責任で解決していく能力、高めていきたいですね。
            </p>
        </div>
    </div>

    <!-- ボタン表示欄 -->
    <div class="row justify-content-end">
        <a class="col-4 btn btn-primary m-1 px-0 text-nowrap custom-button"
            href="{{ route('stresscheck.index') }}">トップへ<br class="d-sm-none" />戻る</a>

        @auth
        <a class="col-4 btn btn-primary m-1 px-0 text-nowrap custom-main-button"
            href="{{ route('stresscheck.record') }}">記録を<br class="d-sm-none" />確認する</a>
        @else
        <a class="col-4 btn btn-primary m-1 px-0 text-nowrap custom-main-button"
            href="{{ route('stresscheck.register') }}">結果を<br class="d-sm-none" />記録する</a>
        @endauth
    </div>

    <div style="text-align:center">
    © 2021 Find Health
    </div>    
    
</div>

@if(app('env') === 'local')
<script>
    console.log('Total:[{{ $result['total'] ?? 0 }}], Level:[{{ $result['level'] ?? 0 }}]');
    console.log({!! json_encode($result) !!});
</script>
@endif

@endsection