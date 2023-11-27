<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

define('MAX_LENGTH', 2048);

class LogMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $response = null;

        try {

            // 前処理
            $list = [];
            try {
                // Start Request
                array_push($list, "RealIP:[{$request->header('x-real-ip', 'none')}]");
                array_push($list, "From:[{$request->ip()}]");
                array_push($list, "To:[{$request->url()}]");
                array_push($list, "Method:[{$request->method()}]");
                array_push($list, 'Hash:[' . spl_object_hash($request) . ']');

                // リクエストパラメータ
                foreach ($request->all() as $key => $value) {
                    // 型チェック
                    $value_type = gettype($value);
                    if ($value_type === 'string' || $value_type === 'NULL') {
                        if (Str::contains(Str::lower($key), 'password')) {
                            array_push($list, '[' . Str::limit($key, MAX_LENGTH) . ']=[****]');
                        } else {
                            array_push($list, '[' . Str::limit($key, MAX_LENGTH) . ']=[' . Str::limit($value, MAX_LENGTH) . ']');
                        }
                    } else if ($value_type === 'array') {
                        foreach ($value as $k => $v) {
                            if (gettype($v) === 'string') {
                                array_push($list, '[' . Str::limit($key, MAX_LENGTH) . '](' . Str::limit($k, MAX_LENGTH) . ')=[' . Str::limit($v, MAX_LENGTH) . ']');
                            } else {
                                // Error
                                array_push($list, '[' . Str::limit($key, MAX_LENGTH) . '](' . Str::limit($k, MAX_LENGTH) . ')=[' . gettype($v) . ']');
                                throw new Exception('Request Array Value is not string type. Key:[' . Str::limit($key, MAX_LENGTH)  . '], Index:[' . Str::limit($k, MAX_LENGTH) . '], ValueType:[' . gettype($v) . ']');
                            }
                        }
                    } else {
                        // Error
                        throw new Exception('Request Value is not string type. Key:[' . Str::limit($key, MAX_LENGTH) . '], ValueType:[' . $value_type . ']');
                    }
                }
            } finally {
                Log::info('[Start Request] ' . join(', ', $list));
                DB::enableQueryLog();
            }

            // 次のMiddleware実行
            $response = $next($request);
            return $response;
        } catch (Exception $exception) {
            Log::error('Error occurred. Message:[' . $exception->getMessage() . ']');
            throw $exception;
        } finally {

            // 後処理
            $list = [];
            try {
                // SQLのログ
                $queryList = DB::getQueryLog();
                foreach ($queryList as $query) {
                    $param_list = $query['bindings'] ?? [];
                    for ($index = 0; $index < count($param_list); $index++) {
                        $param_list[$index] = "[{$param_list[$index]}]";
                    }

                    $sql = $query['query'] ?? '';
                    $sql_parameter_text = Str::replaceArray('?', $param_list, $sql) . ';';
                    if (array_key_exists('time', $query)) {
                        $sql_parameter_text .= " Time:[{$query['time']}]msec";
                    }
                    Log::info("[SQL] {$sql_parameter_text}");
                }

                // End Request
                if ($response == null) {
                    array_push($list, 'ResponseCode:[null]');
                } else if (method_exists($response, 'status')) {
                    array_push($list, "ResponseCode:[{$response->status()}]");
                } else {
                    array_push($list, 'ResponseCode:[stream]');
                }
                if (Auth::check()) {
                    // 認証情報は、認証ミドルウェア実行前は取得不可
                    array_push($list, 'UserID:[' . Auth::id() . ']');
                    array_push($list, 'Name:[' . Auth::user()->name . ']');
                }
                array_push($list, 'Hash:[' . spl_object_hash($request) . ']');
                array_push($list, 'SessionID:[' . Session::getId() . ']');
            } finally {
                DB::disableQueryLog();
                Log::info('[End Request] ' . join(', ', $list));
            }
        }
    }
}
