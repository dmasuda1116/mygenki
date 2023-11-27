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
               人生で与えられた逆境を、どう解釈するか。それが、我々の人生を大きく変えてしまうのです。（田坂広志）
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
                ３元気＝『なんとか元気』
            </x-custom-label>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <p>
                <ul>
                    <li class="custom-font-color">ピンチな状況、なんとかしのでいる。</li>
                    <li class="custom-font-color">体の調子はつらく、不眠・痛み・疲れのサインあり。</li>
                    <li class="custom-font-color">こころの天気は「雨」、乗り越えられる自信がない。</li>
                    <li class="custom-font-color">協力者を見つけられるとピンチがチャンスになる。</li>
                    <li class="custom-font-color">これまでとは違う視点で立て直しましょう。</li><br>
                </ul>
            </p>
                       
            <div class="custom-font-color fw-bold fs-6 mt-5">
                <div style="color:#5E7184;">
                    【３元気のときには？】
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
                    Q.<u>このピンチ、どうしたらいいんだろう？<br /></u>
                </div>
                <div style="text-align:center">
                   👇<br />
                </div>
                <div style="color:#31B56A; text-align:center">
                    A.<u>自分の頭で考えない！</u><br />
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
		           ～『３元気』の状態の理解～
		           </div>
		           
		            <div style="text-align:center">
                    👇<br />
                    </div>
                <div class="fw-bold">    
                    <div style="color:#31B56A; text-align:center">
                        <u>テーマは、「ピンチ」</u><br />
                    </div>
                </div>		           
		           
               </div>
                   <div class="fw-bold mt-2">
                       <div style="color:#31B56A;">
                          【考え方を変えよう】<br />
                       </div>
                   </div>
                現実に起きている問題に、全力で対応しているがうまくいかず、心身に不調も感じ、ギリギリの状態が続き、しんどい状態。<br />
                これ以上、事態を引き延ばすことができない危機的状況、いろいろと手を打ってきたが、解決の糸口を見つけられない。<br />
                自分の経験や能力をすべて使っても、事態が解決しない時は、自分だけで考えず、人さまの知恵をお借りするタイミング。<br />
                ピンチをチャンスに変えるためには、自分の頭だけで考えない。<br />
<br />
               <div style="color:#5E7184; text-align:center">
                   <div class="fs-5 fw-bold mt-4">
                   ～『３元気』の対応のポイント～
                   </div>
                   
                   <div style="text-align:center">
                    👇<br />
                   </div>
               <div class="fw-bold">
                   <div style="color:#31B56A; text-align:center">
                       <u>ターゲットは、「思考」</u><br />
                   </div>
               </div>                   
                   
                   
               </div>
                   <div class="fw-bold mt-2">
                       <div style="color:#31B56A;">
                           【7人の侍をあげてみよう】<br />
                       </div>
                   </div>

               <div class="fw-bold">
                  <u>〇 これまでの考えを捨てよう<br /></u>
               </div>
                
                     これまで行動してきても、事態が解決できていないのなら、今後も同じ考えで行動しても、解決しないのでは。これまでの考えにこだわらないことが必要。取捨選択していい。<br />
                <br />
               <div class="fw-bold">
                <u>〇 違う考えで見てみよう<br /></u>
               </div>
                     「このピンチ、あの人だったら、どう考えて、行動するだろうか？」。あなたにとって人生の師の視点で、状況を見立て直すことをしてみましょう。自分を超える視点を見つける。<br />
                <br />
                <div class="fw-bold">
                <u>〇 試練は成長の機会<br /></u>
                </div>
                     「なぜこんな状況になったんだ」と、嘆きたくなる気持ち、くやしい思いがわいてきますよね。そのネガティブエネルギーを成長の方向に向けましょう。逆境が可能性を引き出す。<br />
                <br />
                <div style="color:#5E7184; text-align:center">
                    <div class="fs-5 fw-bold mt-4">
                ～～～『３元気』のまとめ～～～<br />
                    </div>
                </div>
                  ピンチは同じ考えでやったらピンチのまま。<br />
                  チャンスに変えるには、これまでにない視点に切り替えて、行動に移すことができれば、これまでと違う結果が期待できます。<br />                  
                  そのためには、例えば、師事する7人を想像して、直接意見を聞いたり、あるいは書籍をひもといたりして、賢者の視点をもって作戦を立て直しましょう。<br />
                  本当に困った状況だからこそ、これまでにない考え方や価値観に気づけるチャンス。
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
                    <li class="custom-font-color">今のピンチ、いつ発生して、これまでどんな対処をしてきましたか？</li>
                    ☛「<u>　　　　　　　　　　　　　　　　</u>」</br></br>
                    <li class="custom-font-color">そのピンチをさっそうと解決している自分を妄想すれば、どんなイメージ？</li>
                    ☛ 「<u>　　　　　　　　　　　　　　　　</u>」</br></br>
                    <li class="custom-font-color">あなたが尊敬する人・大好きな人から、どんな言葉をもらえたらがんばれる？</li>
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
                『３元気』のときの<br class="d-sm-none" />メッセージ・コラム☟
            </x-custom-label>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <p class="custom-font-color">
               <div class="custom-font-color fw-bold fs-5 text-center">
                   <div style="color:#31B56A;">
                    ～メガネを変える～
                   </div>
               </div>
               「この状況、きびいしいなあ～」<br />
               「今回だけは、本当にやばいかもしれない・・・」<br />
               <br />
               これまでの自分のやり方が全く通用しない状況になったとき、どうすればいいでしょう。<br />
               <br />
               「明かりを消せ！」<br />
               <br />
               カウンセラーの河合隼雄先生が、ある事例を紹介されたときの言葉。<br />
               <br />
               漁船が暗闇の海で迷ってしまい、岸を見失ってしまった。<br />
               早く岸を見つけねばと、あせった船員たちが必死になって、たいまつをかがげ、岸を探すが見つからない。<br />
               <br />
               しかし、知恵のある船員がこう言った。<br />
               「明かりを消せ！」<br />
               <br />その気迫におされて、船員たちがたいまつを消すと、暗闇の世界が広がった。<br />
               しかし、目がだんだん暗闇に慣れてくると、闇の中から遠くの方に、町の明かりがぼおっと見えてきた。<br />
               帰る方角がわかり無事に帰ることができたということ。<br />
               <br />
               本当に困った時というのは、これまでと同じやり方では通用しない。<br />
               『３元気』の時には、やみくもに・小手先な対処ではなく、根本から対応が必要。<br />
               <br />
               根本とは、なにか、それは自分の考え方。<br />
               同じ考えで行った行動では、いくらやり方を変えても、結果は同じになるだけ。<br />
               <br />
               それでは、ピンチはピンチのまま。<br />
               ピンチをチャンスに変えるには、まずピンチに対する見方を変える必要があります。<br />
               <br />
               田坂広志先生は、このようなメッセージを紹介しています。<br />
               「この苦難や困難は、自分に、何を教えようとしているのか」<br />
               「すべてを、自分の成長のために与えられた「意味のある出来事」として、解釈し、歩んでいくこと。」<br />
               <br />
               <br />
               事例としてご紹介いたします。<br />
               <br />
               がんの告知と右足切断を宣告され、生きる意味を見出せず自殺を考えていた18歳の青年。<br />
               その切断手術の前日、あるテレビ番組を見て、雷にうたれたような衝撃が走りました。<br />
               <br />
               絶望の真っ暗闇のかなたに沈んていた私に、希望という一点の光が灯り続けるようになりました。<br />
               「そんな世界があるんだ！」<br />
               <br />
               そのテレビ番組には、「片足でスキーをしている12歳の少年」が写っていました。<br />
               <br />
               今から、30年前、インターネットなどない時代。<br />
               片足を切断するとどうなるの？、義足とはなに？まったく想像もできない。<br />
               <br />
               また、今は、オリンピックと同列に、障がい者スポーツのパラリンピックが位置付けられるになっていますが、当時は、障がい者に対する偏見・差別が今以上にあった時代。<br />
               <br />
               片足切断したら生きていけない、という不可能マインドのかたまりになってしまっていました。
               <br />
               それが、映像を見た一瞬で、「すごい、自分もスキーをしたい！」、という可能マインドに変わりました。<br />
               <br />
               <br />
               「失ったものを数えるな 残されたものを最大限生かせ」<br />
               これは“パラリンピックの父”と呼ばれるルートヴィヒ・グットマン医師のことばです。<br />
               <br />
               ピンチを乗り越えるには、やみくもに行動を続けてもよい結果につながらないことがあります。<br />
               その場合は、行動のもとになっている、考え方を見直す必要があるかもしれません。<br />
               なぜなら同じ事実でも、どう解釈しているかによって、結果が変わってくるからです。<br />
               <br />人間の思考は、一度に一つのことしか、考えられません。<br />
               ムリと考えたら、ムリな情報しか入ってきません。<br />
               でも、もし可能性は無限にあると考えたら、実現するまで探し続けるでしょう。<br />
               <br />
               ただ、自分の考え方や見方を自分1人で変えるのは、難しいですよね。<br />
               そもそも、自分のメガネで見ているわけですから。<br />
               <br />
               ピンチをチャンスに変えるには、それまでと違う視点で見ることが必要。<br />
               そのために、人様のメガネをお借りすることができれば、同じ事実でも、違う視点があることに気づけることでしょう。<br />
               <br />
               ただ、1人でメガネ探しをするよりも、誰かに手伝ってもらえる方が、より早く、より深い意味に気づけることと思います。<br />
               <br />
               「そんな人はいない！」<br />
               という思い込みのメガネをかけていることに気づいたら、そのメガネはいったんわきに置いて、新しいメガネ探しをしてくれる人を見つけましょう。<br />
               ピンチをチャンスに変えるために。<br />
               <br />
              「神さまは、その人に乗り越えられない試練は与えない」という言葉を確信している人が増えますように。<br />
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