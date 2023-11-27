@extends('stresscheck.template')

@section('content')

<div class="container-fluid">

    <div class="row">
        <div class="col text-center custom-font-color fw-bold fs-2 mt-3">        
            <div style="color:#31B56A;">               
                「元気レベル」は８段階
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
               ストレスは必ずしもからだによくないものとは限らない。それはあなたがストレスをいかにとりあつかうかによる。<br />
               （ハンス・セリエ）
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
                ５元気＝『そこそこ元気』
            </x-custom-label>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <p>
                <ul>
                    <li class="custom-font-color">ストレスや不安を強く感じることがある。</li>
                    <li class="custom-font-color">体の調子は暴飲暴食、甘い物、酒、たばこが増加。</li>
                    <li class="custom-font-color">こころの天気は「くもり」、感情の浮き沈みがある。</li>
                    <li class="custom-font-color">ストレスサインがわかると、ためずに済む。</li>
                    <li class="custom-font-color">ストレスサインを早くキャッチしましょう。</li><br>
                </ul>
            </p>
                       
            <div class="custom-font-color fw-bold fs-6 mt-5">
                <div style="color:#5E7184;">
                    【５元気のときには？】
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
                    Q.<u>ストレスを早く回復させたい、どうすれば？<br /></u>
                </div>
                <div style="text-align:center">
                   👇<br />
                </div>
                <div style="color:#31B56A; text-align:center">
                    A.<u>ストレスは、自分を取り戻すサイン！</u><br />
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
		            ～『５元気』の状態の理解～
		            </div>
		           
		            <div style="text-align:center">
                    👇<br />
                    </div>
                <div class="fw-bold">    
                    <div style="color:#31B56A; text-align:center">
                        <u>テーマは、「ストレス」</u><br />
                    </div>
                </div>
                
               </div>
                   <div class="fw-bold mt-2">
                       <div style="color:#31B56A;">
                          【サインに早く気づこう】<br />
                       </div>
                   </div>
                ふだんなら気にならないことを気にして嫌な気分になっていたり、ストレス発散も実はうまくいっておらず逆にストレスを強めている状態。<br />
                例えば、気分がイライラ・どきどき・うつうつしやすくなったり、ネガティブな言葉をよく使っていたり、暴飲暴食などは、ストレスに巻き込まれているサイン。<br />
                ストレス管理のポイントは、ストレス反応に気づくこと。こころとからだと行動に現れますので、自分はどこに出やすいのかを知るほど、上手に管理できます。<br />
<br />
               <div style="color:#5E7184; text-align:center">
                   <div class="fs-5 fw-bold mt-4">
                   ～『５元気』のときの対応～
                   </div>
                   
                   <div style="text-align:center">
                    👇<br />
                   </div>
               <div class="fw-bold">
                   <div style="color:#31B56A; text-align:center">
                       <u>ターゲットは、「感情」</u><br />
                   </div>
               </div>
                
                
               </div>
                   <div class="fw-bold mt-2">
                       <div style="color:#31B56A;">
                           【10秒深呼吸をしよう】<br />
                       </div>
                   </div>

               <div class="fw-bold">
                  <u>〇 ストレスの定義を変えましょう<br /></u>
               </div>
                
                     ストレスとは、自分を守ってくれるサインです。ストレスを悪いものと理解していると、ストレス病にかかるリスクが高いことが科学的に明らかになっています。<br />
                <br />
               <div class="fw-bold">
                <u>〇 感情にのみこまれない<br /></u>
               </div>
                     ストレス管理の第一のポイントは、管理管理です。感情的になりそうになったら、つばを飲んで、まずは深呼吸（10秒）をしてみましょう。落ち着きますよ。<br />
                <br />
                <div class="fw-bold">
                <u>〇 成功パターンを増やそう<br /></u>
                </div>
                     ストレス管理の一つのストレス発散法は、質より量が大事。だからワンパターンではなく、発散方法の引き出しを増やしましょう。人に聞いてみるのも面白いですよ♪<br />
                <br />
                <div style="color:#5E7184; text-align:center">
                    <div class="fs-5 fw-bold mt-4">
                ～～～『５元気』のまとめ～～～<br />
                    </div>
                </div>
                  人間は感情の生き物。<br />
                  ストレスがおきたり、ストレスがたまると感情的になりやすく、またがまんするほど不調になっていきます。<br />
                  ストレスの傾向を知るほど、うまく付き合えるようになって生きます。<br />
                  ポイントは、まずは感情を静めることです。<br />
                  大丈夫です、感情は静められます。なぜなら感情は自分が生み出しているものだからです。<br />                  
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
                    <li class="custom-font-color">いま、何にストレスを感じ、どんな気持ちが、何％感じていますか？【例：上司―怒り（80%）、あきらめ（60%）、さみしさ（50%）】</li>
                    ☛「<u>　　　　　　　　　　　　　　　　</u>」</br></br>
                    <li class="custom-font-color">深呼吸（10秒）＋「がんばったね～、ありがとう自分」と言ってみよう。1の気持ちはどんな風に変化しましたか？</li>
                    ☛ 「<u>　　　　　　　　　　　　　　　　</u>」</br></br>
                    <li class="custom-font-color">1の状態、本当はどうなればいいですか？</li>
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
                『５元気』のときの<br class="d-sm-none" />メッセージ・コラム☟
            </x-custom-label>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <p class="custom-font-color">
               <div class="custom-font-color fw-bold fs-5 text-center">
                   <div style="color:#31B56A;">
                    ～ストレスの炎～
                   </div>
               </div>
               家の前にゴミが落ちていたら、どうしますか？<br />
               <br />
               （A）ゴミを拾って、ゴミ箱にすてる<br />
               （B）ゴミを拾わず、そのまま家に入る<br />
               （C）（拾う拾わないにかかわらず）文句を言う<br />
               （D）家族に伝えて、とってもらう<br />
               （E）役所に電話をして、とってもらう<br />
               （F）防犯カメラをつけて、犯人をさがす<br />
               （G）警察に連絡して、犯人をつかまえてもらう<br />
               （H）会社を辞めて四六時中、家の中から見張る<br />
               <br />
               ゴミの内容によって、もちろん対処の仕方は違ってきますよね。<br />
               例えば、粗大ごみなのか、紙くずなのか。<br />
               では、そのゴミが、「空き缶」だったらあなたは、どうされますか？<br />
               <br />
               ふつうは（Ａ）ですよね。<br />
               でも、人間は感情の生き物であり、いろいろな事情を抱えていますから、ストレスに感じる度合いは、その時々によって違います。<br />
               <br />
               例えば、両手に荷物をもっていたら（B）になるかもしれませんし、その荷物をいやいやもっていたら（C）になるかも。<br />
               <br />
               同じ事実でも、自分の状況しだいで、ストレスへの対処の仕方は、変わりますよね。<br />
               だから、逆に申せば、ストレスへの対処の仕方を見れば、どのくらいのストレスを抱えている状態なのかがわかるということになります。<br />
               <br />
               ストレス管理が大切と言われるのは、ストレスがたまっていくほどに、そこから意識が離れづらくなり、生活のリズムがくずれていくからです。<br />
               そして、心身の調子もくずれていき、医療のサポートが必要な病気まで発展しまうから。
               あるいは、感情のままに行動して、誰かを責めたり、攻撃しないと気が済まなくなり、生活を壊していくこともあり得ます。<br />
               <br />
               「たかが空き缶、されど空き缶」、空き缶への対応の仕方で、人生が変わっていきます。<br />
               <br />
               ストレスへの対策、初級編として大切なことは、ストレス状態に早く気づくということになります。<br />
               なぜなら、早く気づくほど、ストレスを自らで大きくしてしまわずに、早く解放することができます。<br />
               <br />
               逆にいうと、ストレスに対して意識を向けるほど、ストレスの炎の中に、たいまつをいれることになり、かえってストレスの火を強く、大きくしてしまうことになりかねません。<br />
               <br />
               だから、キャッチ&リリースを心がけましょう。<br />
               早く気づいて、離すことで、気持ちをクールダウンさせることがポイントです。<br />
               <br />
               さらに、ストレス管理で大切なことをもう一つだけ、「ストレスに対する考え方を見直す」ことです。<br />
               <br />
               なぜなら、これまでのストレス教育では伝えられていない、新たな知見が科学的に解明されたからです。<br />
               一言で申せば、「ストレスは人生に役立つもの」という考え方です。<br />
               <br />
               これまでは医学的に「ストレスは健康に害するもの」と言われてきたので、わたしたちは「ストレス＝悪」と考えてきました。<br />
               <br />
               ポイントは、ストレスの種類・内容ではなく、ストレスに対する自分の思い込み＝考え方が、体の反応や選択を変えてしまう事実。<br />
               <br />
               実際の調査によれば、「ストレス＝害」と思い込んでいる人ほど、不適応行動になりがちで、死亡リスクが高まっていることが判明されています。<br />
               <br />
               逆に、ストレスを無害と考えている人は、ひどいストレスがあってもストレスへの対処が最善となる行動をとっていくので、結果、不調にならず、問題も解決して、幸福感を味わうことにつながりやすいとのこと。<br />
               <br />
               つまり、ストレスに対する考え方を変えることができるほど、体に起こる反応の意味が変わり、結果が、より望ましい方向に向かっていくとのこと。<br />
               <br />
               例えば、これまでは緊張する場面では、心臓がドキドキしたり、脈が早まったり、汗がでるなどの体の反応は、プレッシャーのあらわれだから、良くないものと考えられ、不安な気持ちを強めていました。<br />
               <br />
               でも、最新の知見では、それらの体の反応は、悪いものと考えず、逆に起きている事態にチャレンジするための体の準備反応として理解できるので、そのあとの行動がより適切になっていきます。<br />
               だから、ストレスに対する考え方は、敵視ではなく、より良い状態に導いてくれるためのメッセージとして受け止めて、適応的な行動をできるようなるほど、望む結果につながっていきます。効果的なストレスマネジメントを目指しましょう。<br />
               <br />
               日ごろのストレス対処、どこか見直す点はありませんか？<br />
               これまでのストレスへの対処パターンが、かえってストレスの炎を増やしてしまい、結果、健康や幸福感を減らすことになっていないでしょうか？<br />
               <br />
               これからは、家や職場に落ちているごみを見たら、チェックしてはいかがでしょう。<br />
               ゴミを見て、さっと拾えているときは、リセットがうまくできているとき。<br />
               <br />
               逆に、ゴミを見てイライラするときは、余裕がないとき。それに気づいたら、まずは一呼吸しましょう。<br />
               <br />
               そのようにストレスに気づいたら、感情を抑える行動がとれるようになるほど、ストレス対処能力がパワーアップしていきます。<br />
               <br />
               ストレス対処は、キャッチ&アクションです！<br />
               ストレスの炎を増やさず、切り替え名人となって、クールに対処できるよう目指しましょう。<br /> 
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