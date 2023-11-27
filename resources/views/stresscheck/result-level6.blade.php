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
               健康は、習慣によって保たれ、習慣によって損なわれる。<br />
                （日野原重明）
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
                ６元気＝『いつもの元気』
            </x-custom-label>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <p>
                <ul>
                    <li class="custom-font-color">活動と回復のバランスを意識している。</li>
                    <li class="custom-font-color">体の調子は気になるところはなく、まあ順調。</li>
                    <li class="custom-font-color">こころの天気は「晴・曇り」、気分よく過ごせている。</li>
                    <li class="custom-font-color">よい生活習慣のリズムがわかってくると、楽になる。</li>
                    <li class="custom-font-color">インプットとアウトプットのバランスを整えましょう。</li><br>
                </ul>
            </p>
                       
            <div class="custom-font-color fw-bold fs-6 mt-5">
                <div style="color:#5E7184;">
                    【６元気のときには？】
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
                    Q.<u>今の生活習慣を5年続けても大丈夫だろうか？<br /></u>
                </div>
                <div style="text-align:center">
                   👇<br />
                </div>
                <div style="color:#31B56A; text-align:center">
                    A.<u>生活習慣の見直しを！</u><br />
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
		           ～『６元気』の状態の理解～
		           </div>
		           
		            <div style="text-align:center">
                    👇<br />
                    </div>
                <div class="fw-bold">    
                    <div style="color:#31B56A; text-align:center">
                        <u>テーマは、「習慣」</u><br />
                    </div>
                </div>			           
                		           
		           
               </div>
                   <div class="fw-bold mt-2">
                       <div style="color:#31B56A;">
                          【生活習慣のアップデート】<br />
                       </div>
                   </div>
                いいリズムで生活ができている状態。いつもの生活をいつも通りに送ることができ、見通しをもって、安定した毎日を過ごせている。<br />
                例えば、より良い睡眠をとれるように工夫したり、食べるものを気をつけたり、運動を定期的にしたりするなど、よい生活習慣を意識している。<br />
                今の生活習慣では、特に大きな悩みや、困っていることがあるわけでもないので、いつも通りの生活ができているので、緊張せずゆとりをもって生活ができる状況ではないでしょうか。<br />
<br />
               <div style="color:#5E7184; text-align:center">
                   <div class="fs-5 fw-bold mt-4">
                   ～『６元気』の対応のポイント～
                   </div>
                   
                   <div style="text-align:center">
                    👇<br />
                   </div>
               <div class="fw-bold">
                   <div style="color:#31B56A; text-align:center">
                       <u>ターゲットは、「欲求」</u><br />
                   </div>
               </div>                   
                   
                   
               </div>
                   <div class="fw-bold mt-2">
                       <div style="color:#31B56A;">
                           【5年後の自分を想像しよう】<br />
                       </div>
                   </div>

               <div class="fw-bold">
                  <u>〇 体の状態<br /></u>
               </div>
                
                     健康診断の結果はいかがでしょうか？現在の生活習慣をつづけることで、5年後の自分の体の健康は、健やかな状態につながっていますか？楽になれるとつけがたまります。<br />
                <br />
               <div class="fw-bold">
                <u>〇 心の状態<br /></u>
               </div>
                     日々起きるささいなことから、大きな出来事まで、こころは反応し、その事態に備えてくれています。自分の反応のクセに気づき、それにあった心のケアを見つけましょう。<br />
                <br />
                <div class="fw-bold">
                <u>〇 社会的な状態<br /></u>
                </div>
                     健康とは、体と心のことだけをさすのではなく、人や社会とのつながりも含まれます。どのようにつながり、どう貢献しているかも健康と幸せに影響します。未来のために今やるべきことは？<br />
                <br />
                <div style="color:#5E7184; text-align:center">
                    <div class="fs-5 fw-bold mt-4">
                ～～～『６元気』のまとめ～～～<br />
                    </div>
                </div>
                  こころとからだは、表裏一体。そして、社会といかにつながっているかも、今日一日を気分良く過ごすために、必要な要素。<br />
                  人を年齢を重ねていくなかで、体の機能が落ちてしまう所があるので、生活習慣は常に改善することが重要。一方で、こころの機能は、年齢とともに成長し続けることができます。そのためには、こころの健康づくりへの理解と実践が必要です。<br />                 
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
                    <li class="custom-font-color">生活習慣でうまくいっている点と、そうでない点は？</li>
                    ☛「<u>　　　　　　　　　　　　　　　　</u>」</br></br>
                    <li class="custom-font-color">5年後、どんな生活ができていれば幸せですか？</li>
                    ☛ 「<u>　　　　　　　　　　　　　　　　</u>」</br></br>
                    <li class="custom-font-color">今、一番気になる生活習慣、半年後どうなっていれば理想？</li>
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
                『６元気』のときの<br class="d-sm-none" />メッセージ・コラム☟
            </x-custom-label>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <p class="custom-font-color">
               <div class="custom-font-color fw-bold fs-5 text-center">
                   <div style="color:#31B56A;">
                    ～今日は何点？～
                   </div>
               </div>
                朝は、「よーし、今日も元気にがんばるそー！」<br />
                夜は、「あ～、今日も一日よくがんばった～」<br />
                <br />
                今日、ご自分のお力をどれだけ出し切れましたか。<br />
                今日一日、ご自分に点数をつけるとすれば、何点？<br />
                <br />
                『６元気』の状態なら、まあまあの一日を送れている感じはあるのではないでしょうか。<br />
                特に大きな出来事がなく、また心身の調子では特に気になることもなく.
                <br />
                <br />
                もちろん、もっと好調だった人からすれば、調子が下降気味に感じてい場合もあれば、逆に不調だった人からすれば、上向きとして実感されている方もいるでしょう。<br />
                ただ、多くの人が、この安定した状態をキープすることが健康の一つに目安として、考えているのではないでしょうか。<br />
                <br />
                人間は習慣の生き物なので、いつもと同じどおりの状態に安心感をおぼえ、無意識で行動していることが多いです。<br />
                それで、よい点をつけられているときは、ＯＫなのですが、人生いろいろ起きますよね。<br />
                <br />
                例えば、ゲリラ豪雨にあった、残業を急に言われた、コミュニケーションがうまれくとれなかった、仕事でミスをした、お茶をこぼした、楽しみにしていたスイーツがうりきれていた、など。<br />
                <br />
                たとえ、ついていないと思われることがあっても、落ち着いて対応して、その日の疲れを翌日に持ち越さないよう回復させ、翌朝、いつも通りの生活を送れるよう目指しているのでは。<br />
                <br />
                そんな毎日の生活習慣、どんなことを心がけていますか？<br />
                今日の点数をもっと満足させるために、どんな習慣を見直した方がいいと思いますか。<br />
                <br />
                私の場合で申せば、人生の折り返し地点をターンしている年代ですので、20代の時に習慣になっていた、お酒を飲んだ後の美味しい締めのラーメンを食べてしまうと、翌日のコンディションがガタ落ちです。<br />
                <br />
                だから、一日のパファーマンスをよくするために、何が必要で、何をセーブしないといけないか、年代によってコンディションの整え方が、違うといま、痛感しています(笑)。<br />
                <br />
                もちろんコンディションの整え方は、一人一人違うものですから、自分に必要なテーマと、やり方が必要です。<br />
                <br />
                ただ、コンディションの整え方でのポイントは、活動と回復のバランスです。<br />
                いかに今日一日、自分の力を出し切れる活動状態にするか、<br />
                そして一日の終わりにはできるだけ早く回復させて、翌日を迎えるかということ。<br />
                <br />
                つまり、パフォーマンスと疲労回復です。<br />
                いまのあなたに必要な生活習慣、どんなことを改めるとバランスがよくなり、今日の自分の点数をよくできそうですか？<br />
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