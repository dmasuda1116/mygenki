<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\StressCheckController;
use App\Models\EnergyHistory;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function (Request $request) {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

// 認証機能のRoute
require __DIR__ . '/auth.php';



////////////////////////////////////////////////////////////////////////////////
// トップページ
Route::get('/', function (Request $request) {
    return redirect()->route('stresscheck.index');
});
Route::get('/stresscheck', function (Request $request) {
    return redirect()->route('stresscheck.index');
});

Route::get('/stresscheck/index', [StressCheckController::class, 'showIndex'])
    ->name('stresscheck.index');

// ストレスチェック画面
Route::get('/stresscheck/check', function (Request $request) {
    return view('stresscheck.check');
})
    ->name('stresscheck.check');

// 結果画面
Route::match(['get', 'post'], '/stresscheck/result', [StressCheckController::class, 'showResult'])
    ->name('stresscheck.result');

// チェック結果記録表示画面（プレビュー）
Route::get('/stresscheck/record/{preview_user_id}', [StressCheckController::class, 'showRecord'])
    ->middleware('stresscheck.admin');
// チェック結果記録表示画面（参照）
Route::get('/stresscheck/record', [StressCheckController::class, 'showRecord'])
    ->middleware('auth')
    ->name('stresscheck.record');
// チェック結果記録表示画面（追加/更新）
Route::post('/stresscheck/record', [StressCheckController::class, 'updateRecord'])
    ->middleware('auth');
// チェック結果記録表示画面（削除）
Route::delete('/stresscheck/record', [StressCheckController::class, 'deleteRecord'])
    ->middleware('auth');

// ユーザー登録画面
Route::match(['get', 'post'], '/stresscheck/register', function (Request $request) {
    return view('stresscheck.register');
})
    ->name('stresscheck.register');

// ログイン画面
Route::match(['get', 'post'], '/stresscheck/login', function (Request $request) {
    return view('stresscheck.login');
})
    ->name('stresscheck.login');

// ログアウト処理
Route::match(['get', 'post'], '/stresscheck/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('stresscheck.logout');

// 登録情報（プロファイル）画面
Route::get('/stresscheck/profile', function (Request $request) {
    return view('stresscheck.profile');
})
    ->middleware('auth')
    ->name('stresscheck.profile');
Route::post('/stresscheck/profile', [StressCheckController::class, 'updateProfile'])
    ->middleware('auth');

// パスワードリセット要求メール送信画面
Route::get('/stresscheck/forgot-password', function (Request $request) {
    return view('stresscheck.forgot-password');
})
    ->name('stresscheck.forgot-password');

// パスワードリセット
Route::get('/stresscheck/reset-password', function (Request $request) {
    return view('stresscheck.reset-password', ['request' => request()]);
})
    ->name('stresscheck.reset-password');

// お問い合わせメール送信
Route::post('stresscheck/sendmail', [StressCheckController::class, 'sendMail'])
    ->name('stresscheck.sendmail');

// 管理者画面
Route::get('/stresscheck/admin', [StressCheckController::class, 'admin'])
    ->middleware('stresscheck.admin')
    ->name('stresscheck.admin');

// ダウンロード
Route::get('/stresscheck/download/{table_name}', [StressCheckController::class, 'download'])
    ->middleware('stresscheck.admin')
    ->name('stresscheck.download');

// チェック結果で集計
Route::get('/stresscheck/stresscheck.aggregate-history', [StressCheckController::class, 'aggregateHistory'])
    ->middleware('stresscheck.admin')
    ->name('stresscheck.aggregate-history');

//ユーザーごとに集計
Route::get('/stresscheck/stresscheck.aggregate-user', [StressCheckController::class, 'aggregateUser'])
    ->middleware('stresscheck.admin')
    ->name('stresscheck.aggregate-user');



////////////////////////////////////////////////////////////////////////////////
// デバッグ用画面
Route::get('/stresscheck/info', [StressCheckController::class, 'info'])->name('stresscheck.info')
    ->middleware('stresscheck.admin');
Route::get('/stresscheck/debug', [StressCheckController::class, 'debug'])->name('stresscheck.debug')
    ->middleware('stresscheck.admin');

Route::get('/stresscheck/test', function (Request $request) {
    echo "<!doctype html>";
    echo "<html lang=\"ja\">";
    echo "<head>";
    echo "  <meta charset=\"utf-8\">";
    echo "</head>";
    echo "<body>";
    echo "  <hr />日本語表示ソニー暴走 JavaScript/CSS<hr />";
    echo "</body>";
    echo "</html>";
})
    ->middleware('stresscheck.admin');

Route::get('/stresscheck/sample', function (Request $request) {

    var_dump('Start');
    echo ('<br />');

    try {
        $x = $request->header();
        var_dump($x);
    } catch (Exception $exception) {
        Log::error($exception);
    }

    var_dump('End');
    echo ('<br />');

    return view('stresscheck.sample', []);
})
    ->middleware('stresscheck.admin');



////////////////////////////////////////////////////////////////////////////////
// 上記以外
//Route::fallback([StressCheckController::class, 'index']);
//Route::fallback(function ($route) {
//    // ここで何らかの処理をする
//    throw new NotFoundHttpException($route . ' not found');
//});

////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
