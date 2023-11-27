@extends('stresscheck.template')

@section('content')

<div class="container-fluid p-0">

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

    <div style="position:absolute;">
        <!-- サイドバー -->
        <div class="p-3 bg-white" style="width:280px; height:5000px;">
            <div class="d-flex align-items-center pb-3 mb-3 link-dark text-decoration-none border-bottom">
                <span class="fs-5 fw-semibold custom-font-color">管理者用画面</span>
            </div>

            <ul class="list-unstyled ps-0">
                <li><a href="{{ route('stresscheck.admin') }}"
                        class="link-dark rounded custom-font-color">概要（アクセス総数など）を表示</a></li>
            </ul>

            <ul class="list-unstyled ps-0">
                <li><a href="{{ route('stresscheck.aggregate-history') }}"
                        class="link-dark rounded custom-font-color">月ごとのチェック結果を表示</a></li>
                <li><a href="{{ route('stresscheck.aggregate-user') }}"
                        class="link-dark rounded custom-font-color">ユーザーごとのチェック結果を表示</a></li>
            </ul>

            <ul class="list-unstyled ps-0">
                <li><a href="{{ route('stresscheck.download', 'energy_histories') }}"
                        class="link-dark rounded custom-font-color">回答結果(RawData)のダウンロード</a>
                </li>
                <li><a href="{{ route('stresscheck.download', 'users') }}"
                        class="link-dark rounded custom-font-color">ユーザーリスト(RawData)のダウンロード</a>
                </li>
            </ul>
        </div>

        @php
        // データを日本語名称に変換する。
        function format($col_name, $col_value) {
        $format_list = [
        'gender' => [
        'male' => '男性',
        'female' => '女性',
        ],
        'score_avg' => function($value) {
        return sprintf('%0.2f', $value);
        },
        'level_avg' => function($value) {
        return sprintf('%0.1f', $value);
        },
        ];

        $text = '';
        if(array_key_exists($col_name, $format_list)) {
        $obj = $format_list[$col_name];
        if(is_callable($obj)) {
        // 変換メソッド
        $text = $obj($col_value);
        }
        else {
        // 変換する値
        $text = $obj[$col_value] ?? '';
        }
        }
        else {
        $text = $col_value;
        }
        return $text;
        }
        @endphp

        <div style="position:absolute; left:280px;top:0px;width:400px;">

            @isset($result_list)
            <div class="text-nowrap custom-font-color">【月ごとのチェック結果】</div>

            <!-- 二次元配列をテーブル表示 -->
            <table class="table table-sm table-bordered">
                <!-- ヘッダ -->
                <thead class="text-center align-middle">
                    <tr>
                        <th scope="col" class="text-nowrap custom-font-color">集計年月</th>
                        <th scope="col" class="text-nowrap custom-font-color">年代</th>
                        <th scope="col" class="text-nowrap custom-font-color">レベル１</th>
                        <th scope="col" class="text-nowrap custom-font-color">レベル２</th>
                        <th scope="col" class="text-nowrap custom-font-color">レベル３</th>
                        <th scope="col" class="text-nowrap custom-font-color">レベル４</th>
                        <th scope="col" class="text-nowrap custom-font-color">レベル５</th>
                        <th scope="col" class="text-nowrap custom-font-color">レベル６</th>
                        <th scope="col" class="text-nowrap custom-font-color">レベル７</th>
                        <th scope="col" class="text-nowrap custom-font-color">レベル８</th>
                        <th scope="col" class="text-nowrap custom-font-color">合計（回）</th>
                    </tr>
                </thead>

                <!-- 明細行 -->
                <tbody>
                    @foreach ($result_list as $date => $result)
                    @foreach($result as $record)

                    <tr>
                        @if($loop->first)
                        <!-- 年月行 -->
                        <td rowspan="{{ $loop->count }}}" class="custom-font-color">{{ $date }}</td>
                        <td class="custom-font-color text-end">{{ $record['generation'] }}</td>

                        @elseif($loop->last)
                        <!-- 合計行 -->
                        <td class="custom-font-color">合計</td>

                        @else
                        <td class="custom-font-color text-end">{{ $record['generation'] }}</td>

                        @endif

                        <!-- 通常行 -->
                        @isset ($record['level1_max'])
                        <td class="custom-error-font-color text-end"> {{ $record['level1'] }}</td>
                        @else
                        <td class="custom-font-color text-end"> {{ $record['level1'] }}</td>
                        @endif
                        @isset ($record['level2_max'])
                        <td class="custom-error-font-color text-end"> {{ $record['level2'] }}</td>
                        @else
                        <td class="custom-font-color text-end"> {{ $record['level2'] }}</td>
                        @endif
                        @isset ($record['level3_max'])
                        <td class="custom-error-font-color text-end"> {{ $record['level3'] }}</td>
                        @else
                        <td class="custom-font-color text-end"> {{ $record['level3'] }}</td>
                        @endif
                        @isset ($record['level4_max'])
                        <td class="custom-error-font-color text-end"> {{ $record['level4'] }}</td>
                        @else
                        <td class="custom-font-color text-end"> {{ $record['level4'] }}</td>
                        @endif
                        @isset ($record['level5_max'])
                        <td class="custom-error-font-color text-end"> {{ $record['level5'] }}</td>
                        @else
                        <td class="custom-font-color text-end"> {{ $record['level5'] }}</td>
                        @endif
                        @isset ($record['level6_max'])
                        <td class="custom-error-font-color text-end"> {{ $record['level6'] }}</td>
                        @else
                        <td class="custom-font-color text-end"> {{ $record['level6'] }}</td>
                        @endif
                        @isset ($record['level7_max'])
                        <td class="custom-error-font-color text-end"> {{ $record['level7'] }}</td>
                        @else
                        <td class="custom-font-color text-end"> {{ $record['level7'] }}</td>
                        @endif
                        @isset ($record['level8_max'])
                        <td class="custom-error-font-color text-end"> {{ $record['level8'] }}</td>
                        @else
                        <td class="custom-font-color text-end"> {{ $record['level8'] }}</td>
                        @endif

                        <td class="custom-font-color text-end">{{ $record['total'] }}</td>
                    </tr>

                    @endforeach
                    @endforeach
                </tbody>
            </table>

            @endisset

            @isset($user_list)
            <div class="text-nowrap custom-font-color">【ユーザーごとのチェック結果】（参考）</div>

            <!-- 二次元配列をテーブル表示 -->
            <table class="table table-sm table-bordered">
                @foreach($user_list as $user)
                @if($loop->first)
                <!-- ヘッダ -->
                <thead class="text-center align-middle">
                    <tr>
                        <th rowspan="2" class="text-nowrap custom-font-color">ID</th>
                        <th rowspan="2" class="text-nowrap custom-font-color">ユーザー名</th>
                        <th rowspan="2" class="text-nowrap custom-font-color">email</th>
                        <th rowspan="2" class="text-nowrap custom-font-color">年代</th>
                        <th rowspan="2" class="text-nowrap custom-font-color">チェック数</th>
                        <th colspan="3" class="text-nowrap custom-font-color">スコア</th>
                        <th colspan="3" class="text-nowrap custom-font-color">レベル</th>
                        <th rowspan="2" class="text-nowrap custom-font-color">初回チェック時刻</th>
                        <th rowspan="2" class="text-nowrap custom-font-color">最終チェック時刻</th>
                    </tr>
                    <tr>
                        <th class="text-nowrap custom-font-color">min</th>
                        <th class="text-nowrap custom-font-color">max</th>
                        <th class="text-nowrap custom-font-color">avg</th>
                        <th class="text-nowrap custom-font-color">min</th>
                        <th class="text-nowrap custom-font-color">max</th>
                        <th class="text-nowrap custom-font-color">avg</th>
                    </tr>

                </thead>
                @endif

                <!-- 明細 -->
                <tbody>
                    <tr>
                        <!-- ID -->
                        <td class="text-nowrap custom-font-color">{{ format('id', $user->id) }}</td>
                        <!-- ユーザー名称 -->
                        <td class="text-nowrap custom-font-color"><a target=”_blank”
                                href="{{ route('stresscheck.record') }}/{{ $user->id }}">{{ format('name', $user->name) }}</a>
                        </td>
                        <!-- email -->
                        <td class="text-nowrap custom-font-color">{{ format('email', $user->email) }}</td>
                        <!-- 年代 -->
                        <td class="text-nowrap custom-font-color text-end">{{ format('generation', $user->generation) }}
                        </td>
                        <!-- チェック回数 -->
                        <td class="text-nowrap custom-font-color text-end">
                            {{ format('check_count', $user->check_count) }}</td>
                        <!-- スコア(min) -->
                        <td class="text-nowrap custom-font-color text-end"> {{ format('score_min', $user->score_min) }}
                        </td>
                        <!-- スコア(max) -->
                        <td class="text-nowrap custom-font-color text-end"> {{ format('score_max', $user->score_min) }}
                        </td>
                        <!-- スコア(avg) -->
                        <td class="text-nowrap custom-font-color text-end"> {{ format('score_avg', $user->score_avg) }}
                        </td>
                        <!-- レベル(min) -->
                        <td class="text-nowrap custom-font-color text-end"> {{ format('level_min', $user->level_min) }}
                        </td>
                        <!-- レベル(max) -->
                        <td class="text-nowrap custom-font-color text-end"> {{ format('level_min', $user->level_max) }}
                        </td>
                        <!-- レベル(avg) -->
                        <td class="text-nowrap custom-font-color text-end"> {{ format('level_avg', $user->level_avg) }}
                        </td>
                        <!-- 初回チェック時刻 -->
                        <td class="text-nowrap custom-font-color">
                            {{ format('start_check_date', $user->start_check_date) }}</td>
                        <!-- 最終チェック時刻 -->
                        <td class="text-nowrap custom-font-color">{{ format('end_check_date', $user->end_check_date) }}
                        </td>
                    </tr>
                </tbody>
                @endforeach
            </table>
            @endisset

            @if(!isset($result_list) && !isset($user_list))
            <!-- 概要 -->
            <div class="text-nowrap custom-font-color">【概要】（参考値）</div>
            <table class="table table-sm table-bordered">
                <tbody>
                    @isset($count_visitors)
                    <tr>
                        <td class="text-nowrap custom-font-color">トップページのアクセス数</td>
                        <td class="text-nowrap custom-font-color">{{ $count_visitors }}回</td>
                    </tr>
                    @endisset
                    @isset($count_histories)
                    <tr>
                        <td class="text-nowrap custom-font-color">チェック回数のトータル</td>
                        <td class="text-nowrap custom-font-color">{{ $count_histories }}回</td>
                    </tr>
                    @endisset
                    @isset($count_users)
                    <tr>
                        <td class="text-nowrap custom-font-color">登録ユーザー数</td>
                        <td class="text-nowrap custom-font-color">{{ $count_users }}人</td>
                    </tr>
                    @endisset
                </tbody>
            </table>

            <hr class="custom-line-color" />

            <div class="text-nowrap custom-font-color">【改定履歴】</div>
            <ul>
                <li class="text-nowrap custom-font-color">2021/04/21</li>
                <ol>
                    <li class="text-nowrap custom-font-color">新規作成</li>
                </ol>
                <li class="text-nowrap custom-font-color">2021/05/04(Version:20210504.000)</li>
                <ol>
                    <li class="text-nowrap custom-font-color">チェック結果の赤枠を太くした</li>
                    <li class="text-nowrap custom-font-color">記録用のグラフの線の色を不透明に変更</li>
                    <li class="text-nowrap custom-font-color">登録情報画面を追加</li>
                    <li class="text-nowrap custom-font-color">性別、年齢を必須入力項目として追加</li>
                    <li class="text-nowrap custom-font-color">回答結果の集計表を追加</li>
                    <li class="text-nowrap custom-font-color">ユーザーリスト、回答結果のエクスポート機能を追加</li>
                    <li class="text-nowrap custom-font-color">問い合わせメール機能を追加</li>
                </ol>
                <li class="text-nowrap custom-font-color">2021/05/12(Version:20210512.000)</li>
                <ol>
                    <li class="text-nowrap custom-font-color">記録画面のメモを、過去30日分のみ表示するよう修正</li>
                    <li class="text-nowrap custom-font-color">（結果へ戻るではなく、）結果を表示するボタンを追加</li>
                    <li class="text-nowrap custom-font-color">メールフォームからお問い合わせをしたユーザーへ、確認メールを送信するよう変更</li>
                    <li class="text-nowrap custom-font-color">入力項目の姓名を、氏名（ニックネーム）に変更</li>
                    <li class="text-nowrap custom-font-color">チェック結果のグラフの凡例の幅を小さくした、表示期間を過去30日分に変更</li>
                    <li class="text-nowrap custom-font-color">質問項目、４択の名称を変更</li>
                    <li class="text-nowrap custom-font-color">（最新の）『結果を確認する』のページへのリンクを追加</li>
                    <li class="text-nowrap custom-font-color">『プロファイル』の名称を『登録情報』に変更</li>
                    <li class="text-nowrap custom-font-color">プルダウンメニューの『ログアウト』ボタンを下段に移動</li>
                    <li class="text-nowrap custom-font-color">トータルのチェック数を表示</li>
                    <li class="text-nowrap custom-font-color">
                        トップページ、チェック結果の記事を追加<br />
                        （参考）チェック画面でChromeコンソール[F12キー押下]を開き、<br />
                        （例）pageGroup.setLevel(5);<br />
                        と入力すると、指定したレベル（上記の場合はレベル５）のチェック結果となるよう、すべてのボタンが選択されます。<br />
                    </li>
                    <li class="text-nowrap custom-font-color">月ごとのチェック結果を表示に縦計を追加</li>
                    <li class="text-nowrap custom-font-color">チェック結果の表の文言を変更</li>
                    <li class="text-nowrap custom-font-color">ユーザーごとの集計表を追加（参考機能）</li>
                </ol>
                <li class="text-nowrap custom-font-color">2021/06/09(Version:20210609.000)</li>
                <ol>
                    <li class="text-nowrap custom-font-color">リファクタリング（storageディレクトリに管理ファイルを追加）</li>
                    <li class="text-nowrap custom-font-color">HTTPS化（SSL/TLS用にNginxを導入）</li>
                    <li class="text-nowrap custom-font-color">ログの強化、リクエストパラメータのチェック</li>
                </ol>
                <li class="text-nowrap custom-font-color">2021/06/19(Version:20210619.000)</li>
                <ol>
                    <li class="text-nowrap custom-font-color">チェック結果の得点分布を変更</li>
                </ol>
                <li class="text-nowrap custom-font-color">2021/07/19(Version:20210719.000)</li>
                <ol>
                    <li class="text-nowrap custom-font-color">性別の質問を削除、ユーザー登録画面の年齢選択欄を削除</li>
                    <li class="text-nowrap custom-font-color">年代の質問順を、最後尾へ移動</li>
                    <li class="text-nowrap custom-font-color">管理画面の性別集計欄を削除</li>
                    <li class="text-nowrap custom-font-color">公開日(7/7)より前にに登録されているテストユーザー（およびそれに紐づくデータ）を削除</li>
                </ol>
                <li class="text-nowrap custom-font-color">2021/09/05(Version:20210905.000)</li>
                <ol>
                    <li class="text-nowrap custom-font-color">チェック結果の、心理、身体、生活、社会の集計結果が誤っていた不具合を修正</li>
                </ol>
            </ul>
            @endif

        </div>
    </div>

</div>

@endsection