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
                私たちがどんなに絶望しようが、どんなに生きたくないと思おうが、いのちというものが一生懸命に生きようとしているのです。<br />
                （星野富弘）
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
                １元気＝『ノー元気』
            </x-custom-label>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <p>
                <ul>
                    <li class="custom-font-color">元気がからっぽにちかい、何にもしたくない、できない。</li>
                    <li class="custom-font-color">体の調子は、不眠・痛み・疲れなどでくるしい。</li>
                    <li class="custom-font-color">心の天気は「台風」、傘がさせないほど荒れている。</li>
                    <li class="custom-font-color">医療の治療と、療養が必要な状態。</li>
                    <li class="custom-font-color">仕事はドクターストップがかかってしばしお休み。</li><br>
                </ul>
            </p>
                       
            <div class="custom-font-color fw-bold fs-6 mt-5">
                <div style="color:#5E7184;">
                    【１元気のときには？】
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
                    Q.<u>療養生活、どんなふうに過ごせばいいんだろう？<br /></u>
                </div>
                <div style="text-align:center">
                   👇<br />
                </div>
                <div style="color:#31B56A; text-align:center">
                    A.<u>診察日をきっかけに、療養生活の見直しを！</u><br />
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
		           ～『１元気』の状態の理解～
		           </div>      
		        
		            <div style="text-align:center">
                    👇<br />
                    </div>
                <div class="fw-bold">    
                    <div style="color:#31B56A; text-align:center">
                        <u>テーマは、「病気」</u><br />
                    </div>
                </div>			           
                      
               </div>
                   <div class="fw-bold mt-2">
                       <div style="color:#31B56A;">
                          【症状を理解しよう】<br />
                       </div>
                   </div>
                自分のからだとこころが思うように動いてくれず苦しくて、一日の中でも波があり、自分でもよくわからないときがある。<br />
                例えば、朝や雨の日は特に調子がわるくゆううつ。気持ちで立て直そうとしてもカラダやこころがついてこない。過去のいやな記憶に悩まされることも多い。<br />
                こころとからだ、くるしいですよね。少しでも楽な状態にするために、医療面のサポートを受けながら、生活では療養環境を整え、心身の調子を安定させましょう。<br />
<br />
               <div style="color:#5E7184; text-align:center">
                   <div class="fs-5 fw-bold mt-4">
                   ～『１元気』の対応のポイント～
                   </div>
                   
                   <div style="text-align:center">
                    👇<br />
                   </div>
               <div class="fw-bold">
                   <div style="color:#31B56A; text-align:center">
                       <u>ターゲットは、「療養」</u><br />
                   </div>
               </div>                                      
                                  
               </div>
                   <div class="fw-bold mt-2">
                       <div style="color:#31B56A;">
                           【ノートを買おう】<br />
                       </div>
                   </div>

               <div class="fw-bold">
                <u>〇 診察日は記録日に<br /></u>
               </div>
                     受診前に、伝えたいこと、質問したいことはメモしておきしょう。また、主治医が言ってくれたことは、メモしましょう。また、自分でも気の向くまま、書くことはおススメ。<br />
                <br />
                <div class="fw-bold">
                <u>〇 そのまま感じましょう<br /></u>
                </div>
                     こころとからだのメッセージは、すべてに意味があるもの。抵抗したり、反発するほど、行き場を失います。つらいときは、つらいよねえ～と受けとめてあげられるといいですね。大切なメッセージだから。<br />
                <br />     
               <div class="fw-bold">
                  <u>〇 あせらずに<br /></u>
               </div>                
                     これまでがんばってきたこころとからだをしっかりと休ませて、ねぎらってあげましょう。少しでも穏やかに過ごせる環境をつくりましょう。大丈夫です、かならずよくなります。<br />
                <br />                <br />
                <div style="color:#5E7184; text-align:center">
                    <div class="fs-5 fw-bold mt-4">
                ～～～『１元気』のまとめ～～～<br />
                    </div>
                </div>
                  診察日をきっかけに、自分の調子をふりかえりましょう。<br />
                  自分の調子の波が自分で理解できるほど、必要な対応法がわかり、回復に向かっていきます。<br />
                  調子の波はとらえづらいので、『ノートに記録』して、見える化することをおススメします。<br />
                  できるときだけでいいですからね。あと、書くこと自体が目的なので、内容で一喜一憂せず、たんに記録するだけでOK！にしましょう。軌跡が自信に変わる時がきます！<br />
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
                    <li class="custom-font-color">今、主治医からどのように療養するよう伝えられていますか？</li>
                    ☛「<u>　　　　　　　　　　　　　　　　</u>」</br></br>
                    <li class="custom-font-color">調子がよくなったら「やりたいこと」&「行ってみたい所」、それぞれあげると？</li>
                    ☛ 「<u>　　　　　　　　　　　　　　　　</u>」</br></br>
                    <li class="custom-font-color">今日、5分間だけ、穏やかに過ごすためにできそうなことはなに？</li>
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
                『１元気』のときの<br class="d-sm-none" />メッセージ・コラム☟
            </x-custom-label>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <p class="custom-font-color">
               <div class="custom-font-color fw-bold fs-5 text-center">
                   <div style="color:#31B56A;">
                    ～からだは知っている～
                   </div>
               </div>
               調子のアップダウンが激しく、「くるしいよぉ・・・」と感じることがよくある状況かもしれません。<br />
               <br />
               『１元気』では、こころのバランスがくずれ、からだは思うように動かせず、眠れず、体力が落ちて、疲れきり、ヘロヘロな状態。<br />
               お医者さんに診ていただき、薬をのんだり、療養したり、休業したりしているけど、回復をなかなか実感できないときがある。<br />
               <br />
               この状況が続けば、続くほど、苦しさがつのる。<br />
               真っ暗闇の中にいて、どこに向かっていけばいいんだろう、いつここから抜け出れるんだろう。
               誰も答えてくれない、どうしたらいいか教えてくれない、教えてくれても中々よくならない、どうしていいかわからない、くるしいなあ～。<br />
               <br />
               「からだは知っている。」<br />
               <br />
               この言葉、わたしのカウンセリングの恩師が授けてくれました。<br />
               「からだはいつも生（せい）に向かって生きている。からだの声を感じなさい。からだは知っている。からだに感謝し、からだを信じなさい。」<br />
               <br />
               『１元気』は、元気を感じられないほど、こころが苦しくなり、からだには不快な症状があちこちにあらわれ、疲れきり、ふつうの生活もできなくなるほど、追い込まれてしまいます。<br />
               「なんとかしてほしいー！」と叫びたくなるけども、誰も受け取ってくれない。<br />
               <br />
               あまりにも、こころとからだから発せられる症状が強いと、とても良くなるとは思えず、絶望しか感じないことも。<br />
               ほんとうにくるしい。<br />
               <br />
               でも、そのくるしい状況の中でも、がんばってくれている人がいます。<br />
               それが、”からださん”です。<br />
               <br />
               例えば、“心臓さん”は血液をめぐらせ続けてくれ、“肺さん”は呼吸をし続けてくれ、“内臓さん”たちは栄養をめぐらせ老廃物を運び出し続けてくれています。<br />
               “からだ”さんは、一瞬も休まず、誰からも指示されず、何も言わず、もくもくと働き続けてくれています。<br />
               <br />
               すべては、わたしたちを生かすために。<br />
               <br />
               ためしに、腕をとって、脈を感じてみてください。<br />
               「トン・トン・トン」と、動いていますよね。<br />
               <br />
               一所懸命に、働いてくれていますよね。<br />
               10秒、感じてみてください。<br />
               <br />
               ・・・・<br />
               ・・・<br />
               ・・<br />
               ・<br />
               <br />
               いかがでしょう、いま、なにを感じられていますか？<br />
               あたまで考えずに、こころにまきこまれず、からだの動き＝いのちをそのままを感じてみてください。<br />
               <br />
               感じるほど、“からださん”のことが身近になり、”こころさん”も安心してくるようになってきます。<br />
               <br />
               ただ、『１元気』の状況は、いろいろな症状が発せられるので、つらく、苦しくなることが続くときがあります。<br />
               <br />
               そのように、“こころさん”から発せられるメッセージがしんどい状況だったとしても、“からださん”はいつも生に向かって、働き続けてくれていることを思い出してください。<br />
               <br />
               でも、そもそも ”こころさん”は、なぜ苦しいメッセージを発しているのでしょう？<br />
               そして、”からださん”は、なぜなにもいわずとも働き続けてくれているのでしょう？<br />
               <br />
               きっと、「大切なことに気づいてほしい！」との願いを伝えてくれているんですよね。<br />
               大切なこと、あなたはどんなことだと思いますか。<br />
               <br />
               その一つは、「感謝」だと思います。<br />
               “からださん”、いつも生に向かって働き続けてくれてありがとう。<br />
               “こころさん”、いつもたくさんのメッセージを贈ってくれてありがとう。でも、これまで気づけずごめんなさい。<br />
               <br />
               もっと、あなたたちの声を聞いてあげられるようになりたい、これからはもっと、あなたのメッセージを感謝の想いで大切に受けとめられるようになりたい。<br />
               <br />
               『１元気』のときはつらく苦しいですが、それは決して私たちを苦しめるためのものではありません。<br />
               私たちにわかってもらいたメッセージを送り続てくれているんだと思います。<br />
               <br />
               だからしんどい時は、だれも責めず、あきらめず、“こころさん”と、“からださん”が少しでも楽になるような環境をつくってあげて、穏やかに過ごしてください。<br />
               <br />
               『ノー元気』とは、『No元気』ではなく『Know元気』です。<br />
               “からだ”さんは、元気になる方向を『知っています』！<br />
               <br />
               「あの体験があったから、あのメッセージがあったから、私の人生は豊かになった！」と、気づけるその時が来るのを信じて、自分のからだとこころをたっぷりといたわってあげる時間をお過ごしください。<br />
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