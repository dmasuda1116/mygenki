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
                他人からみると、そんなつまらないこと気にして、とか、しっかり頑張ればいいじゃないか、という状態でも、本人はすごく苦痛な場合があります。死にたいと思ったりする。                （河合隼雄）
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
                ２元気＝『ミニ元気』
            </x-custom-label>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <p>
                <ul>
                    <li class="custom-font-color">元気エネルギーが少なく、すごくつらい。</li>
                    <li class="custom-font-color">体の調子は悪く、市販薬や治療薬を服用するほど。</li>
                    <li class="custom-font-color">こころの天気は「大雨」。カラータイマーが点滅。</li>
                    <li class="custom-font-color">信頼できる人や、専門家にちゅうちょなく相談するレベル。</li>
                    <li class="custom-font-color">仕事と生活の役割（の一部）を軽減させましょう。</li>
                </ul>                            
            </p>
            
            <div class="custom-font-color fw-bold fs-6 mt-5">
                <div style="color:#5E7184;">
                    【２元気のときには？】
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
                    Q.<u>これ以上がんばれない時、どうしたらいいだろう？<br /></u>
                </div>
                <div style="text-align:center">
                   👇<br />
                </div>
                <div style="color:#31B56A; text-align:center">
                    A.<u>信頼できる３人に相談を！</u><br />
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
		           ～『２元気』の状態の理解～
		           </div>
		           
		            <div style="text-align:center">
                    👇<br />
                    </div>
                <div class="fw-bold">    
                    <div style="color:#31B56A; text-align:center">
                        <u>テーマは、「SOS」</u><br />
                    </div>
                </div>			           
		          
               </div>
                   <div class="fw-bold mt-2">
                       <div style="color:#31B56A;">
                          【SOSを発信するとき】<br />
                       </div>
                   </div>
                これまでの仕事生活ができなくなり、心身の調子が悪く、どうしていいか冷静に判断ができなかったり、このつらい状況をどうやって乗り切っていいかわからないこともある。<br />
                例えば、2週間以上よく眠れていない、食欲がない、役割をこなせない、未来を描けない、逃れたい気持ちが強くなっているなど。<br />
                人知れずものすごくがんばってきたんだと思います。人生のピットインが必要なときです。<br />
                以下の3人に相談して、背負ってきたものをおろし、体制を整えることが必要なレベルです。<br />
<br />
               <div style="color:#5E7184; text-align:center">
                   <div class="fs-5 fw-bold mt-4">
                   ～『２元気』の対応のポイント～
                   </div>   
                   
                   <div style="text-align:center">
                    👇<br />
                   </div>
               <div class="fw-bold">
                   <div style="color:#31B56A; text-align:center">
                       <u>ターゲットは、「相談」</u><br />
                   </div>
               </div>                                      
                   
                                                      
               </div>
                   <div class="fw-bold mt-2">
                       <div style="color:#31B56A;">
                           【アルバムを開こう】<br />
                       </div>
                   </div>

               <div class="fw-bold">
                  <u>〇 医師に相談<br /></u>
               </div>
                
                     からだとこころの症状をおさえるのに、市販薬では限度があります。内科、心療内科、精神科で相談することが必要な状態です。自己治癒力を引き上げるためにも、医療のサポートを受けましょう。医学の力を信じてください。<br />
                <br />
               <div class="fw-bold">
                <u>〇 上司・家族・恩師に相談<br /></u>
               </div>
                     命より優先すべきものはありませんよね。あなた1人で全部背負わなくいいんです。どんな人だって、首相やスポーツ選手などもハードワークを耐えるには限界があります。大丈夫です、相談してください。必ず力になってくれます。<br />
                <br />
                <div class="fw-bold">
                <u>〇 友人・同僚・親戚に相談<br /></　u>
                </div>
                     ピンと来た人に、「〇〇さん、元気？」とラインしてみましょう。「あなたは元気？」と返信がくれば、「実は元気がでないんだ。話、聞いてくれる？」と返信してみましょう。困ったときお互い様です。<br />
                <br />
                <div style="color:#5E7184; text-align:center">
                    <div class="fs-5 fw-bold mt-4">
                ～～～『２元気』のまとめ～～～<br />
                    </div>
                </div>
                 『２元気』は、SOSを発信するレベルです。もう一度お伝えさせていただきます。SOSを発信するレベルです。<br />
                 ちゅうちょせず、評価を気にせず、うまく話そうとせず、できれば3人に相談してください。<br />
                 ご安心ください、まだ回避できるエネルギーがあります。『２元気』で早めに対応できれば、これ以上エネルギーを使わずに、悪化するのを防ぐことができます。<br />
                 あなたをサポートしてくれる人が必ずいます。そして、荷をおろして、立ち止まり、エネルギーがもう少し増えるまで、体制を整えましょう。ピットインしてください！<br />
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
                    <li class="custom-font-color">どんな症状が、いつからあり、どんな市販薬をどれくらい飲んでいますか？</li>
                    ☛「<u>　　　　　　　　　　　　　　　　</u>」</br></br>
                    <li class="custom-font-color">もし、今やっていることのうち２つやらなくていい！と言われたら、何をあげますか？</li>
                    ☛ 「<u>　　　　　　　　　　　　　　　　</u>」</br></br>
                    <li class="custom-font-color">今、一番、話を聴いてくれそうな人は、誰ですか？</li>
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
                『２元気』のときの<br class="d-sm-none" />メッセージ・コラム☟
            </x-custom-label>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <p class="custom-font-color">
               <div class="custom-font-color fw-bold fs-5 text-center">
                   <div style="color:#31B56A;">
                    ～困ったときはお互いさま～
                   </div>
                </div>
                このメッセージをご覧いただこうとしてくださり、ありがとうございます。<br />
                <br />
                いま、あなたがおかれているご事情を伺いしることはできませんが、おそらくあなたをとりまく状況は、きびしくなっているのではないかと思います。<br />
                そのなかであなたは必死でふんばっているのではないでしょうか。<br />
                <br />
                いまのご事情を理解して、支えてくれる人とつながれていることを願います。<br />
                もし、つながれていなかったり、相談ができていなかったら、上記の3人を目安に、どなかたからでもいいので、必ず相談してください。<br />
                <br />
                なぜなら、これ以上あなたの元気エネルギーを減らさないようにするためです。
                元気エネルギーはだいぶ減っていますが、でも『２元気』のエネルギーをこれ以上減らさず、とりえあえずキープできれば、これ以上の悪化は防げます。<br />
                <br />
                だからこれからは、省エネモードに切り替えましょう。<br />
                つまり、今あるエネルギーをこれ以上、使わない作戦をとります。<br />
                <br />
                そのためには、いろいろと担っている役割をおろして、生活のペースも落としましょう。<br />
                今、自分がやっていること（仕事・家庭・プライベートなど）、どれでもいいので、誰かに代わりにやっていただいてください。<br />
                <br />
                そのために、病院を受診して医学的な意見を聞いてください。
                （かかりつけ医でもOK、あるいはメンタル系）<br />
                また、会社や家族などの関係者にも相談してください。<br />
                <br />
                相談は、上手に話す必要ななく、次の3点を伝えればＯＫです。<br />
                １．いま、つらい状況にいる<br />
                ２．これまでのようにできない<br />
                ３．サポートしてほしい<br />
                <br />
                そしてその相談した後に、さらに大事なことが２つあります。<br />
                <br />
                １つ目は、今抱えていること（一部でもOK）を、誰かにやっていただき負担を減らしましょう。<br />
                2つ目は、信頼できる人からの申し出は、そのまま聞き入れましょう。<br />
                <br />
                例えば、医師から「まずはしばらく休んで静養しましょう！」「服用してください。」<br />
                <br />
                会社から「〇〇の業務は代わりの者にさせるから、状況を教えてほしい」<br />
                <br />
                家族から「今日は仕事を休んで様子をみよう」「一緒に病院に行こう」「〇〇さんに相談をして」<br />
                など言われたら、それ以上がんばろうとせずに、その人たちの言ってくれた通り身を任せましょう。<br />
                そうすればひとまずは、エネルギーをそれ以上使わずにすみます。<br />
                <br />
                事態の改善を図っていくには、おそらくもっとエネルギーを必要とするでしょう。<br />
                それは次のステップとしましょう。<br />
                <br />
                今は！ひとまず、省エネモードに切り替えて元気エネルギーの放出をとめましょう。<br />
                事態の改善には、あせりは禁物、プロセスが大切。<br />
                階段の高さをなるべく低くして、確実に上がっていけるような道のりにしましょう。<br /
                <br />
                <br />
                ここまでお読みになった方で、もしかしたら、次のように思う人がいるかもしれません。<br />
                「まだ、自分でやれる！」<br />
                「迷惑をかけたくない！」<br />
                「やれるところまでやらなければ！」<br />
                <br />
                がんばることが超得意なひとは、きっとまだがんばれるでしょう。<br />
                なぜなら、エネルギーがまだあるから。<br />
                <br />
                だからどうしても、自分でやらないと気がすまない方は、引き続きご自身でやり続けるんだと思います。<br />
                でももしその場合は、次の1点だけ注意してください。<br />
                <br />
                必ず期限を設けてください。<br />
                リミットは、3日間。<br />
                それで、状況が改善されればＯＫですよね。<br />
                <br />
                でももし、3日やっても状況が改善されなければ、ＳＯＳを発信してください。<br />
                絶好調のときのあなたの能力なら解決できることであっても、『２元気』の今のコンディションでは、能力の半分も発揮できていないはず。<br />
                <br />
                その状況でこれ以上がんばってしまうと、残りの元気エネルギーは、必ず減っていきます。<br />
                しかも、一気になくなってしまう恐れがあります。<br />
                <br />
                元気エネルギーがからっぽになると、どうなるか<br />
                <br />
                それは、ある日、突然やってきます。<br />
                急に、電池が切れたように、シャットダウンします。<br />
                こころがポキッと折れて、からだに力が入らなくなります。<br />
                <br />
                そうなるとどうなるか、心身の治療だけでなく、社会的な治療としてリハビリも必要になってくるでしょう。<br />
                そうなると、長期の療養になる可能性が高まります。<br />
                <br />
                だから『２元気』でしのげるなら、どんな手を使ってでもこれ以上の悪化は防ぎましょう。<br />
                『１元気』にならないで済むなら、それに越したことはありません。<br />
                <br />
                エネルギーを空っぽにするまでがんばる必要はありません。<br />
                むしろ、エネルギーが少しでも残っている方が、それだけ選択の幅を持てることになります。<br />
                全部を1人でやろうとしなくていいんです。<br />
                <br />
                残念ながら、あなたがそこまで追い込まれているのは、周りは理解できていないでしょう。<br />
                だから、あなたからＳＯＳを発信してください。<br />
                <br />
                自分から発信しないと、周りはあなたのその大変さに気づけません。<br />
                あなたの周りには、あなたを支えてくれる人は必ずいます。<br />
                だから、ＳＯＳを発信してください。<br />
                <br />
                『２元気』は、サインを出すタイミングです。<br />
                人の評価は無視しましょう。<br />
                もともと人が自分をどう思っているかは、コントロールできません。<br />
                <br />
                人からの評価を気にするあまり、自分のエネルギーを使ってしまうのはもったいないです。<br />
                いまの状況に必要なのは、元気エネルギーを使わないこと。<br />
                <br />
                そのために、背負っている荷物をおろして、省エネモードのペースを見つけることです。<br />
                大丈夫です。その荷物を代わりに、あるいは一緒に背負ってくれる人は、必ずいます。<br />
                <br />
                困った時はお互いさまです。<br />
                <br />
                迷惑をかけては申し訳ないなどの後ろめたい気持ちが出ても、それは、あなたがそれ以上悪化させず、回復していくことが、最大のお返しになります。<br />
                <br />
                『２元気』は、ＳＯＳを発信するタイミングです。<br />
                大丈夫です。あなたが安心・信頼できる人に、相談をしてみてください。<br />
                必ず、受け止め、理解して、サポートしてくれる人はいます。<br />
                <br />
                省エネモードに切り替えましょう。<br />
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