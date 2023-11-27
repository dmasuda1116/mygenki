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
                私がこの世に生れてきたのは、私でなければできない仕事が何かひとつこの世にあるからなのだ。<br />
                （相田みつを）
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
                ８元気＝『スッキリ元気』
            </x-custom-label>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <p>
                <ul>
                    <li class="custom-font-color">生きがいを感じている。</li>
                    <li class="custom-font-color">体の調子は「快調」、体の整え方がうまくいっている。</li>
                    <li class="custom-font-color">こころの天気は「快晴」、すみきった素直な心。</li>
                    <li class="custom-font-color">人生の目的が明確なほど、充実する。</li>
                    <li class="custom-font-color">人と一緒に幸せの輪を広げていることに喜びを感じている。</li><br>
                </ul>
            </p>
                       
            <div class="custom-font-color fw-bold fs-6 mt-5">
                <div style="color:#5E7184;">
                    【８元気のときには？】
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
                    Q.<u>私の命、なんのためにあるんだろう？<br /></u>
                </div>
                <div style="text-align:center">
                   👇<br />
                </div>
                <div style="color:#31B56A; text-align:center">
                    A.<u>メメントモリ（＝死を忘れるな）</u><br />
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
		           ～『８元気』の状態の理解～
		           </div>
		           
		            <div style="text-align:center">
                    👇<br />
                    </div>
                <div class="fw-bold">    
                    <div style="color:#31B56A; text-align:center">
                        <u>テーマは、「生きがい」</u><br />
                    </div>
                </div>			           
                		           
               </div>
                   <div class="fw-bold mt-2">
                       <div style="color:#31B56A;">
                          【利他の喜び】<br />
                       </div>
                   </div>
                身近な人とのつながりを大切にしており、その人たちの喜びが自分の喜びになっている。大切にしたい人の輪が広がっている状態。<br />
                例えば、人との輪の広がりといえば、パートナー、夫婦、親子、家族親戚、友人、会社の同僚・上司、地域、国、世界など。そのスタートは自分。<br />
                自分の価値観を大切に、大切な人や大切なことをはっきりさせ、優先させて、望む方向に自分らしく向かっている状態。<br />
<br />
               <div style="color:#5E7184; text-align:center">
                   <div class="fs-5 fw-bold mt-4">
                   ～『８元気』の対応のポイント～
                   </div>
                   
                                      <div style="text-align:center">
                    👇<br />
                   </div>
               <div class="fw-bold">
                   <div style="color:#31B56A; text-align:center">
                       <u>ターゲットは、「使命」</u><br />
                   </div>
               </div>                                      
                   
               </div>
                   <div class="fw-bold mt-2">
                       <div style="color:#31B56A;">
                           【お墓参りをしよう】<br />
                       </div>
                   </div>

               <div class="fw-bold">
                  <u>〇 自分のルーツ<br /></u>
               </div>
                
                     自分の命がなぜ、今、ここにあるのでしょうか。自分の命の源はだれ？今の仕事をはじめるときの初心は？お世話になった方々は？日本の成り立ちは？ルーツにさかのぼると使命が見えてきます。<br />
                <br />
               <div class="fw-bold">
                <u>〇 感謝報恩<br /></u>
               </div>
                     今の生活ができているのは、お互いに支えあい、多くの人たちが自分の役割と責任を果たしてくれているおかげ。さらには、人だけでなはなく、自然・地球・宇宙があってのこと。感謝の想いは行動につながるほど命は輝く。<br />
                <br />
                <div class="fw-bold">
                <u>〇 命のバトン<br /></u>
                </div>
                     次の世代が、今の自分の年齢になったとき、きっと笑顔で幸せに暮らしていることでしょう。そのために、いま、私たちがしておくべきことがあります。SDGsもその一つ。<br />
                <br />
                <div style="color:#5E7184; text-align:center">
                    <div class="fs-5 fw-bold mt-4">
                ～～～『８元気』のまとめ～～～<br />
                    </div>
                </div>
                  今、生かされているには、意味や理由があるように感じることはないでしょうか。親・ご先祖さまから授かったわが命、その使い方は任されています。<br />
                  命輝くためには、自分を超えて、誰かのために生きている時なのかもしれません。<br />
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
                    <li class="custom-font-color">一番喜んでもらいたい人は、どなた？</li>
                    ☛「<u>　　　　　　　　　　　　　　　　</u>」</br></br>
                    <li class="custom-font-color">これをしなかったらきっと後悔することってどんなこと？</li>
                    ☛ 「<u>　　　　　　　　　　　　　　　　</u>」</br></br>
                    <li class="custom-font-color">私が最も大切にしているポリシーは、なに？</li>
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
                『８元気』のときの<br class="d-sm-none" />メッセージ・コラム☟
            </x-custom-label>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <p class="custom-font-color">
               <div class="custom-font-color fw-bold fs-5 text-center">
                   <div style="color:#31B56A;">
                    ～アンパンマンは決めている～
                   </div>
               </div>
               私たちは、何のために、誰のために、仕事をしているんでしょう。<br />
               <br />
               仕事という言葉は、たんに会社で働くという意味でだけではなく、生きていくための役割という意味です。<br />
               だから、家での家事や、家族の一員としての役割、地域活動に参加するなど、いろいろな仕事＝役割を持ちながら、生活を送っています。<br />
               <br />
               そして、その生活を設計するスパンは、いまや100年です。<br />
               <br />
               コロナになる前は働き方改革と叫ばれており、コロナになってからは生き方を変えざるを得ない状況になっています。<br />
               <br />
               いまほど、働き方や生き方が、私たち1人ひとりに問われていることは、これまで経験したことはなかったですよね。<br />
               <br />
               いまは、それほどの歴史的な大転換期に私たちは、直面しているのではないでしょうか。<br />
               <br />
               あなたは、ご自分の人生、どんな想いをもって、どんな役割を果たすことがご自分の生きる目的ととらえていますか？<br />
               <br />
               言葉を変えれば、「使命」。<br />
               <br />
               ハッキリと定められている時は、ご自分の価値観をしっかりと持っている時でしょう。<br />
               <br />
               つまり、自分にとって最も大切なことや、最も大切な人を最も大切にするために、最も大切なことを優先すると決めている。<br />
               <br />
               そのために、日常のやることを明確にして、優先順位をつけて時間とエネルギーを注げている状態。<br />
               <br />
               そこには、いやいや仕事をしたり、義務的に取り組んだり、後回しにしたりすることはない状態。<br />
               <br />
               なぜなら、このようにならないために、自分の命の使い方＝「使命」を決めているから。<br />
               <br />
               だから、使命に生きている状態こそ、最も生きていることの喜びや感謝を感じられている時ではないでしょうか。<br />
               <br />
               『８元気』のときには、本当に自分のやりたいことに向かって進みながらも、健康管理もしっかりとれて、人とのつながりを大切にでき、人生がトータルに充実している理想の状態。<br />
               <br />
               私で申せば、『８元気』を目指しているのが実情です。<br />
               <br />
               使命・夢・志をはっきりさせて向かってはいるものの、全体のバランスが取れていないことがよくあります。<br />
               <br />
               例えば、仕事に専念するあまり、家族との時間や、健康管理をする時間をさいてしまい、幸せのバランスがくずれていることがあります。<br />
               <br />
               それこそ、最近にあった話です。<br />
               <br />
               ある大きな役割を担わせていただくかの決断を迫られることがありました。<br />
               どうしても自分で決めきれなかったので、尊敬する師に相談をさせていただきました。<br />
               <br />
               そのなかで、次の質問がありました。<br />
               <br />
               「あなにとって、幸せとはなんですか？」<br />
               ・<br />
               ・<br />
               ・<br />
               <br />
               ☛「・・・」<br />
               <br />
               しばし沈黙の時間を与えていただきましたが、私は言葉を出すことができませんでした。<br />
               <br />
               もちろん、表面的な言葉として、たんに音を出すことはできたかもしれません。<br />
               でも、その言葉に魂が入っていないことは、音を出せば明白になるので無意味だと感じたら、言葉がでませんでした。<br />
               <br />
               “幸せを言葉にできない生き方になっている”、目から鱗が落ちるような衝撃でした。<br />
               <br />
               「幸せとはなんですか？」
               <br />
               あなたなら、どうお答えになりますか？<br />
               また、あなたにとって最も大切な人は、いま幸せそうですか？<br />
               <br />
               そういえば、日本の幸福度は、G7で最下位。国連加盟国156中では62位。<br />
               しかも、その順位は年々下がっているという実態。<br />
               <br />
               私たち、働く世代は、何のために、誰のために、どこに向かって、自分の命を毎日、使っているんでしょう。<br />
               <br />
               自戒を込めて、もっと幸せな命の使い方が広がることを切に願っています。<br />
               メンタルヘルスとは、心の病気ではなく、心の健康、ひいては心の幸せに向かっていく状態へと発展させていくことが、もっと必要ではないでしょうか。<br />
               <br />
               では、『８元気』の状態をどうやって目指していけばいいのでしょう。<br />
               <br />
               実は、その生き方をしている適任者がいるので、ご紹介します。<br />
               <br />
               それは、「アンパンマン」です。<br />
               <br />
               アンパンマンの歌詞をGoogleってみてください。<br />
               <br />
               ～～～(^^♪<br />
               そうだ！嬉しいんだ　生きる喜び　たとえ胸の傷が痛んでも<br />
               何の為に生まれて　何をして生きるのか<br />
               答えられないなんて そんなのは嫌だ！～～～<br />
               <br />
               私がご提案するメンタルヘルスとは、自分の使命を定め、そこに向かう幸せをみんなと感じられている、そんなこころのあり方です。<br />
               <br />
               メンタルヘルス＝こころの健康づくりで、元気の輪がもっと広がり、幸せの総量が増えることを願っています。<br />
               <br />
               そのために、「元気」をキーワードに、8段階のレベルで見える化できるよう、メンタル・チェックシステムを開発いたしました。<br />
               <br />
               元気の言葉をもっと気楽に交わせる環境をつくることで、お互いに元気をもとにしたつながりが生まれ、広がり、深まると信じています。<br />
               <br />
               元気発見！の輪を広げたい。<br />

               弊社の名前は、Find Health（ファインドヘルス＝元気発見）<br />
               <br />
               経営理念は、「愛と勇気のメンタルヘルス」<br />
               　ありのままの自分を受け入れ、<br />
               　理想の気持ちに向かっていくための<br />
               　こころの健康をご一緒に見つけます。<br />
               　誰もが最も大切な人の元気を見つけられるようご支援させていただきます。<br />
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