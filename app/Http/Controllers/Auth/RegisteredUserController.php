<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        // 入力値チェック
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8|max:255',
            //'gender' => 'required|string|max:16',
            'generation' => 'required|numeric|max:200',
        ]);

        // ユーザーレコード作成
        $record = [];
        $record['name'] = $request->name;
        $record['email'] = $request->email;
        $record['password'] = Hash::make($request->password);
        $record['gender'] = $request->gender;
        $record['generation'] = $request->generation;

        $user = User::create($record);

        // ログイン
        Auth::login($user);
        event(new Registered($user));

        return redirect(RouteServiceProvider::HOME);
    }
}
