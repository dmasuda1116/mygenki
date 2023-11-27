<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use Carbon\Carbon;
use App\Models\EnergyHistory;
use App\Models\Memo;
use App\Models\User;
use App\Models\Visitor;

class StressCheckController extends Controller
{
    public function showIndex(Request $request)
    {
        // アクセス数をDBへ保存
        $record = [
            'ip' => $request->ip(),
            'url' => $request->fullUrl(),
        ];
        if (Auth::check()) {
            $record['user_id'] = Auth::id();
        }
        Visitor::create($record);

        return view('stresscheck.index');
    }

    // チェック結果をDBへ保存し、チェック結果画面を表示する
    public function showResult(Request $request)
    {
        $energy_history = null;

        if ($request->has('form_data')) {
            // 登録するべきチェック結果あり
            $form_data = $request->input('form_data', '[]');
            $answers = json_decode($form_data, true);

            $category_map = [];
            $total = 0;
            // DBへレコード追加
            $record = ['classification_type' => 'ver3']; // カテゴリのパターン
            $currentrowIndex = 0;
            foreach ($answers as $answer) {
                $category = $answer['category'];
                $value = $answer['value'];

                if ($category === 'category_gender') {
                    // 性別
                    $record['gender'] = $value; // male/female
                } elseif ($category === 'category_generation') {
                    // 年代
                    $record['generation'] = $value; // 20、30、...、70、80
                } else {
                    // 各回答に値を設定
                    $currentrowIndex++;
                    $record['a' . sprintf('%02d', $currentrowIndex)] = $value;

                    ////////////////////////////////////////////////////////////////////////////////
                    // 分類、合計、レベルを集計
                    $temp = $category_map[$category] ?? 0;
                    $category_map[$category] = $temp + $value;
                    $total += $value;
                }
            }

            $record['mental'] = $category_map['category_mental'];
            $record['physical'] = $category_map['category_physical'];
            $record['life'] = $category_map['category_life'];
            $record['society'] = $category_map['category_society'];
            $record['total'] = $total;
            $record['level'] = StressCheckController::checkLevel($total);

            if (Auth::check()) {
                // ログイン済
                $record['user_id'] = Auth::id();
                if (!isset($record['gender'])) {
                    $record['gender'] = Auth::user()->gender;
                }
                if (!isset($record['generation'])) {
                    $record['generation'] = Auth::user()->generation;
                }
            }
            $energy_history = EnergyHistory::create($record);

            if (!Auth::check()) {
                // これから登録するユーザーと紐づけるために、記録したレコードのIDを引き継ぐ
                Session::put('energy_history_id', $energy_history->id);
            }
        } else {
            // 登録するべきチェック結果なし

            $energy_id = Session::get('energy_history_id');
            if ($energy_id) {
                // Sessionに残っている記録
                $energy_history = EnergyHistory::where('user_id', Auth::id())->where('id', $energy_id);
            } else {
                // 最後に記録したチェック結果
                $energy_history = EnergyHistory::where('user_id', Auth::id())
                    ->orderBy('updated_at', 'desc')
                    ->first();
            }
        }

        if ($energy_history) {
            // Levelに応じたViewを利用する
            return view('stresscheck.result-level' . $energy_history['level'], ['result' => $energy_history ?? []]);
        } else {
            return $this->showIndex($request);
        }
    }

    // 記録画面を表示する
    public function showRecord(Request $request, $preview_user_id = null)
    {
        if (Auth::check()) {
            if (Session::has('energy_history_id')) {
                // 記録したレコードがあれば、ログインしたユーザーと紐づける。
                EnergyHistory::where('id', Session::get('energy_history_id'))
                    ->where('user_id', null)
                    ->update(['user_id' => Auth::id()]);
                Session::forget('energy_history_id');
            }
        }

        // どのユーザーのデータを表示するか判定
        $preview = false;
        $target_user = Auth::user();
        if (!is_null($preview_user_id) && $preview_user_id != Auth::id()) {
            // プレビューモード（管理者が他のユーザーの記録を参照する）
            $preview = true;
            $target_user = User::where('id', $preview_user_id)->first();
            if (!$target_user) {
                // 処理続行不可->リダイレクト
                return redirect()->route('stresscheck.index');
            }
        }

        // 対象ユーザーの記録を取得
        $energy_histories = EnergyHistory::where('user_id', $target_user->id)
            //->where('classification_type', 'ver3')
            ->where('created_at', '>=', Carbon::today()->subdays(30)) // 過去30日分
            ->orderBy('created_at')
            ->take(500)
            ->get();

        // 最終チェック時刻を判定
        $should_check = true;
        $energy_history = $energy_histories->last();
        if ($energy_history) {
            if ($energy_history->created_at->diffInHours(Carbon::now()) < 12) {
                $should_check = false;
            }
        }

        // メモの取得
        $memos = Memo::where('user_id', $target_user->id)
            ->where('created_at', '>=', Carbon::today()->subdays(30)) // 過去30日分
            ->orderBy('created_at', 'desc')
            ->take(500)
            ->get();

        return view('stresscheck.record', [
            'records' => $energy_histories,
            'memos' => $memos,
            'should_check' => $should_check,
            'preview' => $preview,
            'user_name' => $target_user->name,
        ]);
    }

    // メモの追加/更新
    public function updateRecord(Request $request)
    {
        // 入力値チェック
        $request->validate([
            'id' => 'max:255',
            'memo' => 'string|max:255',
        ]);

        // 該当のメモを取得
        $memos = Memo::where('user_id', Auth::id())
            ->where('id', $request->get('id'))
            ->first();

        if ($memos) {
            // 更新
            $memos->update(['memo' => $request->get('memo')]);
        } else {
            // 新規作成
            $memos = Memo::create(['user_id' => Auth::id(), 'memo' => $request->get('memo')]);
        }

        return $this->showRecord($request);
    }

    // メモの削除
    public function deleteRecord(Request $request)
    {
        // 入力値チェック
        $request->validate([
            'id' => 'max:255',
        ]);

        $memos = Memo::where('user_id', Auth::id())
            ->where('id', $request->get('id'))
            ->first();
        if ($memos) {
            $memos->delete();
        }

        return $this->showRecord($request);
    }

    // 質問メールの送信
    // <https://qiita.com/rana_kualu/items/58abbfa135f4e16c0914>
    public function sendMail(Request $request)
    {
        // 入力値チェック
        $request->validate([
            'text' => 'string|max:1024',
        ]);

        $userMailAddress = '';
        $text = '';
        if (Auth::check()) {
            $userMailAddress = Auth::user()->email;
            $text .= 'ユーザー名:[' . Auth::user()->name . ']さん' . "\n";
        } else {
            $userMailAddress = $request->get('email') ?? 'unknown@mail';
            $text .= 'ユーザー名:[ゲスト]' . "\n";
        }
        $text .= '送信者メールアドレス:[' . $userMailAddress . ']' . "\n";
        $text .= '本文:' . "\n";
        $text .= $request->get('inquiry');

        // 管理者へ、メール送信
        $result = Mail::raw($text, function ($message) use ($userMailAddress) {
            $message->to(config('mail.from.address'))
                ->from($userMailAddress)
                ->subject('[' . config('app.name') . ']お問い合わせを承りました。]');
        });
        Log::info('[Mail] ' . 'From:[' . $userMailAddress . '], To:[' . config('mail.from.address') . '], Text:[' . Str::limit($text, 250) . ']');

        // ユーザーへ、メール送信
        $result = Mail::raw($text, function ($message) use ($userMailAddress) {
            $message->to($userMailAddress)
                ->from(config('mail.from.address'))
                ->subject('[' . config('app.name') . ']お問い合わせを承りました。]');
        });
        Log::info('[Mail] ' . 'From:[' . config('mail.from.address') . '], To:[' . $userMailAddress . '], Text:[' . Str::limit($text, 250) . ']');

        return $this->showRecord($request);
    }

    public function updateProfile(Request $request)
    {
        // 入力値チェック
        $request->validate([
            'name' => 'required|string|max:255',
            //'gender' => 'required|string|max:16',
            'generation' => 'required|numeric|max:200',
        ]);
        if ($request->password) {
            $request->validate([
                'password' => 'required|string|confirmed|min:8|max:255',
            ]);
        }

        // ユーザーレコード更新
        $record = [
            'name' => $request->name,
            'gender' => $request->gender,
            'generation' => $request->generation,
        ];
        if ($request->password) {
            $record['password'] = Hash::make($request->password);
        }

        $user = User::first()->where('id', Auth::id());
        if ($user) {
            $user->update($record);

            // ログイン（リフレッシュ）
            Auth::loginUsingId(Auth::id());
        }

        // 処理結果メッセージ表示
        return view('stresscheck.profile', ['messages' => ['更新しました。']]);
    }

    public function admin(Request $request)
    {
        return view('stresscheck.admin', [
            'count_visitors' => Visitor::count(),
            'count_histories' => EnergyHistory::count(),
            'count_users' => User::count(),
        ]);
    }

    // 月ごとのチェック結果を集計
    public function aggregateHistory(Request $request)
    {
        $level_key_list = ['level1', 'level2', 'level3', 'level4', 'level5', 'level6', 'level7', 'level8'];

        // 局所関数定義
        $create_init_data = function () use ($level_key_list): array {
            // [ 'level1' => 0, 'level2' => 0, ... ～ 'level8' => 0 ]
            $create_level_map = function () use ($level_key_list) {
                $map = [];
                foreach ($level_key_list as $level) {
                    $map[$level] = 0;
                }
                return $map;
            };

            return [
                '10' => $create_level_map(),
                '20' => $create_level_map(),
                '30' => $create_level_map(),
                '40' => $create_level_map(),
                '50' => $create_level_map(),
                '60' => $create_level_map(),
                '70' => $create_level_map(),
                '80' => $create_level_map(),
            ];
        };
        // 横計を取得する
        $get_total = function ($record) use ($level_key_list): int {
            $total = 0;
            foreach ($level_key_list as $key) {
                $total += $record[$key] ?? 0;
            }
            return $total;
        };
        // 最大値をもつキーを配列で取得する。 [ 'lvel3', 'level8' ]などを戻す。
        $get_top_keys = function ($record) use ($level_key_list): array {
            // 最大値を算出
            $max = 0;
            foreach ($level_key_list as $key) {
                $value = $record[$key] ?? 0;
                if ($max < $value) {
                    $max = $value;
                }
            }

            // 最大値をもつキーを取得
            $top_key_list = [];
            if ($max > 0) {
                foreach ($level_key_list as $key) {
                    $value = $record[$key] ?? 0;
                    if ($max === $value) {
                        array_push($top_key_list, $key);
                    }
                }
            }

            return $top_key_list;
        };
        // 各レベルごとのチェック回数を足す（横計）
        $add_to_record = function (&$dest_record, $src_record) use ($level_key_list): void {
            foreach (array_merge($level_key_list, ['total']) as $key) {
                if (!array_key_exists($key, $dest_record)) {
                    $dest_record[$key] = 0;
                }
                $dest_record[$key] += ($src_record[$key] ?? 0);
            }
        };



        // 集計対象年月
        $month = 12;
        $target_date = Carbon::today()->subMonth($month);
        $target_date->day = 1; // 月初

        // Eloquentでテーブル結合
        // SQL構築
        $query = EnergyHistory::select(
            DB::raw("DATE_FORMAT(MIN(created_at), '%Y/%m') as created_month"),
            'generation',
            'level',
            DB::raw('COUNT(level) as number_of_people'),
            DB::raw('MIN(total) as min_score'),
            DB::raw('MAX(total) as max_score')
        )
            ->where('created_at', '>=', $target_date)
            ->groupby(DB::raw("DATE_FORMAT(created_at, '%Y/%m')"), 'generation', 'level')
            ->orderby('created_month', 'desc')
            ->orderby('generation')
            ->orderby('level');
        // var_dump($query->toSql(), $query->getBindings());
        // SQL実行
        $records = $query->get(); // Laravelのモデルクラス

        // 表示用データを作成
        $start_month = Carbon::today();
        $start_month->day = 1; // 月初
        $in_data = [];
        for ($index = 0; $index < $month + 1; $index++) {
            $current_month  = $start_month->copy()->subMonth($index)->format('Y/m');
            $in_data[$current_month] = $create_init_data();
        }

        // 検索結果でループし、表示用データへ追加
        foreach ($records as $record) {
            $value = Arr::get($in_data, "{$record->created_month}.{$record->generation}.level{$record->level}", null);
            if (!is_null($value)) {
                Arr::set(
                    $in_data,
                    "{$record->created_month}.{$record->generation}.level{$record->level}",
                    $value + $record->number_of_people
                );
            } else {
                // 性別、年齢未登録データなど
                // Neglect.
            }
        }

        // For Debug.
        // var_dump($records);
        // ini_set('xdebug.var_display_max_children', -1);
        // ini_set('xdebug.var_display_max_data', -1);
        // ini_set('xdebug.var_display_max_depth', -1);
        // var_dump($in_data);

        // 装飾の追加、装飾、データ形式の変換
        $out_data = [];
        // 年月ごと
        foreach ($in_data as $key_date => $value_date) {
            $list_date = [];
            $total_record = ['generation' => ''];

            // 年代ごと
            foreach ($value_date as $key_generation => $record) {
                $record['generation'] = $key_generation;

                // 横計
                $total = $get_total($record);
                $record['total'] = $total;

                // 回数がTopのLevelを取得し、印をつける
                $top_keys = $get_top_keys($record);
                foreach ($top_keys as $level) {
                    $record[$level . '_max'] = true;
                }

                // 縦計累積
                $add_to_record($total_record, $record);
                array_push($list_date, $record);
            }

            // 縦計追加
            $top_keys = $get_top_keys($total_record);
            foreach ($top_keys as $level) {
                $total_record[$level . '_max'] = true;
            }
            array_push($list_date, $total_record);

            $out_data[$key_date] = $list_date;
        }

        //var_dump($out_data);

        return view('stresscheck.admin', ['result_list' => $out_data]);
    }

    // ユーザーごとのチェック結果を集計
    public function aggregateUser(Request $request)
    {
        // Eloquentでテーブル結合
        // SQL構築
        $query = User::select(
            'users.id as id',
            'users.name as name',
            'users.email as email',
            'users.gender as gender',
            'users.generation as generation',
            DB::raw('COUNT(energy_histories.id) as check_count'),
            DB::raw('IFNULL(MIN(energy_histories.total), 0) as score_min'),
            DB::raw('IFNULL(MAX(energy_histories.total), 0) as score_max'),
            DB::raw('IFNULL(AVG(energy_histories.total), 0) as score_avg'),
            DB::raw('IFNULL(MIN(energy_histories.level), 0) as level_min'),
            DB::raw('IFNULL(MAX(energy_histories.level), 0) as level_max'),
            DB::raw('IFNULL(AVG(energy_histories.level), 0) as level_avg'),
            DB::raw('IFNULL(MIN(energy_histories.created_at), "") as start_check_date'),
            DB::raw('IFNULL(MAX(energy_histories.created_at), "") as end_check_date'),
        )
            ->leftJoin('energy_histories', 'energy_histories.user_id', '=', 'users.id')
            ->groupby('users.id', 'users.name', 'users.email', 'users.gender', 'users.generation')
            ->orderby('users.id');
        // var_dump($query->toSql(), $query->getBindings());
        // SQL実行
        $users = $query->get(); // Laravelのモデルクラス

        return view('stresscheck.admin', ['user_list' => $users]);
    }

    // 指定したテーブルをCSVでダウンロード
    public function download(Request $request, $table_name)
    {
        Log::info("[SQL] Export table. TableName:[{$table_name}]");

        $callback = function () use ($table_name) {
            $csvFile = fopen('php://output', 'w'); // ファイル作成

            $index = 0;
            $header = [];
            $rows = DB::table($table_name)->get();
            foreach ($rows as $row) { // rowはstdClass
                $row = (array)$row; // 連装配列に変換

                if ($index == 0) {
                    // ヘッダ
                    foreach ($row as $name => $value) {
                        array_push($header, mb_convert_encoding($name, 'SJIS-win', 'UTF-8')); // S-JISに変換
                    }
                    fputcsv($csvFile, $header);
                }

                // 明細
                $record = [];
                foreach ($header as $name) {
                    array_push($record, mb_convert_encoding($row[$name], 'SJIS-win', 'UTF-8')); // S-JISに変換
                }
                fputcsv($csvFile, $record);
                $index++;
            }

            fclose($csvFile); // ファイル閉じる
        };

        $responseHeaders = [ // レスポンスのヘッダー情報
            'Content-type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename=' . $table_name . '.csv',
            'Pragma' => 'no-cache',
            'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
            'Expires' => '0',
        ];
        return response()->stream($callback, 200, $responseHeaders); // ここで実行
    }

    // スコアからレベルを算出
    public static function checkLevel(int $score): int
    {
        if ($score < 350) {
            return 1;
        }
        if ($score < 470) {
            return 2;
        }
        if ($score < 580) {
            return 3;
        }
        if ($score < 690) {
            return 4;
        }
        if ($score < 800) {
            return 5;
        }
        if ($score < 910) {
            return 6;
        }
        if ($score < 1020) {
            return 7;
        }
        return 8;
    }



    ////////////////////////////////////////////////////////////////////////////////
    // 実行環境の情報を出力する。
    public function info(Request $request)
    {
        phpinfo();
    }
    public function debug(Request $request)
    {
        echo ('--- Start ---<br />');

        var_dump($request->header());
        echo ('<br />');

        echo ('AppPath:[' . app_path() . ']<br />');
        echo ('BasePath:[' . base_path() . ']<br />');
        echo ('ConfigPath:[' . config_path() . ']<br />');
        echo ('DatabasePath:[' . database_path() . ']<br />');
        echo ('PublicPath:[' . public_path() . ']<br />');
        echo ('ResourcePath:[' . resource_path() . ']<br />');
        echo ('StoragePath:[' . storage_path() . ']<br />');
        echo ('Dir:[' . __DIR__ . ']<br />');
        echo ('Locale:[' . app()->getLocale() . ']<br />');

        echo ('CurrentRouteName:[' . Route::currentRouteName() . ']<br />');
        echo ('CurrentRouteAction:[' . Route::currentRouteAction() . ']<br />');

        // Version
        echo ('Laravel Version:[' . Application::VERSION . ']<br />');
        echo ('PHP Version:[' . PHP_VERSION . ']<br />');

        // Route
        echo ('Dashboard Route:[' . route('dashboard') . ']<br />');

        // Request
        echo ('Request Path:[' . $request->path() . ']<br />');
        echo ('Request FullURL:[' . $request->fullUrl() . ']<br />');
        echo ('Request IP:[' . $request->ip() . ']<br />');

        // env
        echo ('env AppName:[' . env('APP_NAME') . ']<br />');
        echo ('config AppName:[' . config('app.name') . ']<br />');
        echo ('config AppEnv:[' . config('app.env') . ']<br />');

        // 認証
        // https://memocarilog.info/php-mysql/8749
        echo ('Login:[' . Auth::check() . ']<br />');  // ログイン判定
        echo ('UserID:[' . Auth::id() . ']<br />');    // ログインユーザーID
        echo ('User:[' . Auth::user() . ']<br />');    // ログインユーザー情報

        // ユーザー情報
        $user = exec('whoami');
        $group = exec('groups ' . $user);
        echo "ユーザー:[{$user}]<br />";
        echo "グループ:[{$group}]<br />";
        echo 'ID:[' . exec('id') . ']<br />';

        echo ('--- End ---');
    }
}
