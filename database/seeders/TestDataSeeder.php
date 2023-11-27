<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\EnergyHistory;
use App\Models\Memo;

class TestDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Eloquent::unguard();

        // ランダムデータ
        User::factory(20)->create();
        EnergyHistory::factory(40)->create();
        //EnergyHistory::factory(5000)->create();
        Memo::factory(100)->create();

        // 管理者
        $user_record = [
            'name' => '吉田 貴芳',
            'email' => 'gai-les.pan.2-7@jcom.home.ne.jp',
            'email_verified_at' => now(),
            'password' => '$2y$10$soPsH27cRasLx8cVGMPf4uYCLcfaBblUpa9ql5aZTREC3JllW/TTq',
            'remember_token' => Str::random(10),

            // Added
            'account_type' => 'admin',
            //'company_id' => null,
            'gender' => 'male',
            'generation' => 40
        ];
        $user = User::create($user_record);

        $user_record = [
            'name' => '佐々木 秀行',
            'email' => 'h_sasaki@fb3.so-net.ne.jp',
            'email_verified_at' => now(),
            'password' => '$2y$10$SXkXYRuOocfuqr2UTB0THOyEMdD8QdbXR/OoDscjFwWjSoW18qsY2',
            'remember_token' => Str::random(10),

            // Added
            'account_type' => 'admin',
            //'company_id' => null,
            'gender' => 'male',
            'generation' => 40
        ];
        $user = User::create($user_record);

        // 佐々木の回答結果を作成する
        for ($index = 0; $index < 40; $index++) {
            $energy_history = EnergyHistory::factory()->make();
            $energy_history->user_id = $user->id;
            $energy_history->gender = $user->gender;
            $energy_history->generation = $user->generation;
            $energy_history->save();
        }
        // コメント
        for ($index = 0; $index < 20; $index++) {
            $comment = Memo::factory()->make();
            $comment->user_id = $user->id;
            $comment->save();
        }
    }
}
