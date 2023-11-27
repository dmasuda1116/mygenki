<?php

namespace Database\Factories;

use App\Models\Memo;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class MemoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Memo::class;

    private static $forign_key_list = null;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // 外部キーを取得
        if (MemoFactory::$forign_key_list === null) {
            $list = [];
            $users = User::get();
            foreach ($users as $user) {
                array_push($list, $user->id);
            }
            MemoFactory::$forign_key_list = $list;
            var_dump('get user id. Count:[' . count(MemoFactory::$forign_key_list) . ']');
        }

        return [
            'user_id' => $this->faker->randomElement(MemoFactory::$forign_key_list),
            'memo' => $this->faker->realText($maxNbChars = 50, $indexSize = 1),
            'created_at' => $this->faker->dateTimeBetween($startDate = '-2 week', $endDate = 'now')
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    /*
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
*/
}
