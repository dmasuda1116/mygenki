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
                人はなぜ自分を幸せにすることを追求しないのか。<br />
                （マーティン・セリグマン）
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
                ７元気＝『わくわく元気』
            </x-custom-label>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <p>
                <ul>
                    <li class="custom-font-color">新たな挑戦にワクワクしている。</li>
                    <li class="custom-font-color">体の調子は「好調」、身軽に動けている。</li>
                    <li class="custom-font-color">こころの天気は「晴れ」、やる気スイッチが入ってる。</li>
                    <li class="custom-font-color">やりたいことを見つけられると、生活にはりが出る。</li>
                    <li class="custom-font-color">うまくいっているイメージを持ちましょう。</li><br>
                </ul>
            </p>
                       
            <div class="custom-font-color fw-bold fs-6 mt-5">
                <div style="color:#5E7184;">
                    【７元気のときには？】
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
                    Q.<u>人生を楽しんでいるだろうか？<br /></u>
                </div>
                <div style="text-align:center">
                   👇<br />
                </div>
                <div style="color:#31B56A; text-align:center">
                    A.<u>ブレーキを外して、アクセルを踏みこみましょう！</u><br />
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
		           ～『７元気』の状態の理解～
		           </div>
		            <div style="text-align:center">
                    👇<br />
                    </div>
                <div class="fw-bold">    
                    <div style="color:#31B56A; text-align:center">
                        <u>テーマは、「夢」</u><br />
                    </div>
                </div>			           
		           
		           
               </div>
                   <div class="fw-bold mt-2">
                       <div style="color:#31B56A;">
                          【幸せは歩いてこない】<br />
                       </div>
                   </div>
                実現させたい目標があり、そのために時間とエネルギーをそそぐことができ、楽しい感じで生活することができている。<br />
                例えば、希望の仕事につくことができた、資格試験にチャレンジしている、ダイエットをしている、3年後にマイホームを建てるなど、願いがある。<br />
                仕事・生活の中で、新たなことに挑戦している、あるいは、挑戦したい。ドキドキ・ワクワクすることを見つけ、実現に向け行動をはじめている。<br />
<br />
               <div style="color:#5E7184; text-align:center">
                   <div class="fs-5 fw-bold mt-4">
                   ～『７元気』の対応のポイント～
                   </div>
                   
                   <div style="text-align:center">
                    👇<br />
                   </div>
               <div class="fw-bold">
                   <div style="color:#31B56A; text-align:center">
                       <u>ターゲットは、「脳」</u><br />
                   </div>
               </div>                                                         
                   
               </div>
                   <div class="fw-bold mt-2">
                       <div style="color:#31B56A;">
                           【寄り道をしよう】<br />
                       </div>
                   </div>

               <div class="fw-bold">
                  <u>〇 脱ワンパターン<br /></u>
               </div>
                
                     脳は自分の司令塔。私たちの体は、司令塔からのメッセージを受け動いています。その司令塔（＝脳）は、指示を出さないといつもと同じメッセージを発しています。どんな指示を出していますか？<br />
                <br />
               <div class="fw-bold">
                <u>〇 自分に許可を出す<br /></u>
               </div>
                     「人生楽しみたいですよね～！」。楽しんでいいんです、幸せを増やしていいんです、もっと自分の可能性を引き出していいんです。人生は一度きり、世界は広くて深い。<br />
                <br />
                <div class="fw-bold">
                <u>〇 一生成長できます♪<br /></u>
                </div>
                     私たちの体は、年齢とともにその機能は衰えてきます。で・す・が、脳はなんと一生成長し続けることができる臓器。脳を成長させ続けることで、認知症になりにくいばかりか、一生青春・一生感動人生が待っています。<br />
                <br />
                <div style="color:#5E7184; text-align:center">
                    <div class="fs-5 fw-bold mt-4">
                ～～～『７元気』のまとめ～～～<br />
                    </div>
                </div>
                  写真をとる機会がたくさんあるときというのは、生活が充実しているときではないでしょうか。「この楽しい時間を思い出に残しておきたい」と思うから。<br />
                  待つよりも、自ら想像しましょう。不思議と想像したものが集まってきます。<br />
                  「幸せは歩いてこない、だ～から歩いていくんだよ♪」 <br />
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
                    <li class="custom-font-color">やりたいこと、９つあげるとすればどんなこと？</li>
                    ☛「<u>　　　　　　　　　　　　　　　　</u>」</br></br>
                    <li class="custom-font-color">そのうちの1つがかなった状態、どこで、誰と、何をして、どんな気持ち？</li>
                    ☛ 「<u>　　　　　　　　　　　　　　　　</u>」</br></br>
                    <li class="custom-font-color">実現するために、どこに行けば or 誰と会えば、その夢に一歩近づきますか？</li>
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
                『７元気』のときの<br class="d-sm-none" />メッセージ・コラム☟
            </x-custom-label>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <p class="custom-font-color">
               <div class="custom-font-color fw-bold fs-5 text-center">
                   <div style="color:#31B56A;">
                    ～夢～
                   </div>
               </div>
               「さんま・玉緒のお年玉　あんたの夢をかなえたろかスペシャル」というテレビ番組があります。<br />
               街頭インタビューで、「あなたの夢はなんですか？」とマイクを向けられ、その中から後日、本当に夢を叶えてくれるという、ステキな番組。<br />
               <br />
               よろしければ、以下、夢の質問におつきあいください。
               <br />
               もし、この番組からオファーがくれば、あなたは出演したいですか？<br />
               しかも、テレビ番組にして放映はしないという条件。<br />
               <br />
               つまり、純粋にあなたの夢を一つだけならなんでも叶えてくれるという企画だったら、あなたは、出演したいですか？<br />
               <br />
               ただ、出演するには、一つだけ次の条件を満たす必要があります。<br />
               それは、「今から、10秒以内に夢を言い切ること！」<br />
               <br />
               ご希望者の方、それでは、今から10秒以内で、あなたが叶えたい夢を語ってみてください。<br />
               <br />
               はい、スタート！<br />
               10<br />
               9<br />
               8<br />
               7<br />
               6<br />
               5<br />
               4<br />
               3<br />
               2<br />
               1<br />
               <br />はい、終了―！<br />
               あなたは、自分の夢を語ることができましたか？<br />
               <br />
               夢を語ることができたあなたは、きっと日ごろから楽しいことや、幸せになることにアンテナを立てられている方だと思います。<br />
               一方、10秒以内で、夢を語ることができなかったあなた、きっと毎日を一生懸命に過ごしていらっしゃることと思います。<br />
               <br />
               夢を語れたあなたに質問です。<br />
               「その夢は、本当に、心の底から叶えたい夢ですか？」<br />
               <br />
               夢を語れなかったあなたに質問です。<br />
               「叶えたい夢が見つかるまで、1年待ってくれるとしたら、夢を見つけたいと思いますか？」<br />
               <br />
               いかがでしょう。<br />
               以上、夢の話におつきあいくださり、ありがとうございます。<br />
               <br />
               <br />
               いま、あなたのまわりに夢を語っている人は、どれだけいらっしゃいますか？<br />
               <br />
               私の周りを見渡せば、夢を語る人、夢を叶えようと行動している人は、たくさんいます。<br />
               <br />
               でも私は長い間、夢を語る以前に、夢を持つという考え方すらなかった時がありました。<br />
               <br />
               ただ、毎日を生きている、がんばっている、しのでいる、気づけば時間だけがたっている。<br />
               <br />
               でもふと思いました、夢がない生き方を続けたいのかと・・・。<br />
               <br /
               脱サラして、心理カウンセラーとなってからは、多くの方々の生き方と向き合わせていただきました。<br />
               <br />
               こころの専門家として出会う方は、生き方に悩まれている方々。<br />
               その方々に対して、当初、私がご提供していたのは、悩みが楽になるようにすることでした。<br />
               <br />
               結果はどうだったか？<br />
               悩みを軽減したり、解消することは、可能でした。<br />
               <br />
               でも、ある時から、疑問を感じるようにもなりました。<br />
               <br />
               ご相談者の方が本当に望んでいるのは、悩みの解消だろうか？と。<br />
               メンタルヘルスの重要性が、社会的に必要と叫ばれていく中で、心理カウンセラーは日本でも広がっています。<br />
               <br />
               でも、例えば、カウンセリングと言えば、ネガティブな印象がくっついています。<br />
               なぜでしょう？<br />
               <br />
               「こころが弱い人がするもの」「心が不調や病気の人がするもの」と思われているからです。<br />
               もちろん、こころが調子が良くない時に、心理サポートは効果があるので、もっとご活用していただくことを願っています。<br />
               <br />
               しかし、メンタルヘルス（＝こころの健康づくり）を追及するほど、こころを豊かに、幸せにするための世界がたくさんあることを知るようになりました。<br />
               <br />
               今では、心理業界でも、「ポジティブ心理学」や、「ポジティブメンタルヘルス」と領域が増えています。<br />
               また、経営学の中でも「幸せ」を科学したり、「人間学」でも「幸せ」を追求する世界は広がっています。<br />
               <br />
               病気にならないことや病気から快復することは何より大事。でもそれ以外にも、普通に過ごせる安定した状態を維持することも大事、夢をもって幸せを味わって生きていくのも大事。<br />
               つまり悩みや願望は、「幸せになりたい」ということ。<br />
               <br />
               そのための方法が、メンタルヘルス（＝こころの健康づくり）にも、あることを知っていただきたい。<br />
               <br />
               情報・デジタル時代の今、さらにはコロナによってライフスタイルを変えざるを得ず、先の見通しも立てづらい今、こころを健康の重要性を私たちは痛感していると思います。<br />
               <br />
               どうすれば？<br />
               <br />
               「夢」<br />
               <br />
               子どもだけでなく、大人も、お年寄りも誰もが、もっと夢をもって、その実現に向かっていきませんか！<br />
               <br />
               「夢に向かって生きる人生」と、そうでない人生。<br />
               <br />
               一度きりの人生、ワクワク・楽しくなるように、「夢の力」を使ってはいかがでしょう。<br />
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