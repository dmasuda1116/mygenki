<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\EnergyHistory;
use App\Models\User;
use App\Http\Controllers\StressCheckController;

class EnergyHistoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = EnergyHistory::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // ユーザー一覧を取得
        $users = User::get();

        $user = ($this->faker->randomElement($users));
        $userId = $user->id;
        $gender = $user->gender ?? $this->faker->randomElement([null, 'male', 'female']);
        $generation = $user->generation ?? $this->faker->randomElement([null, 10, 20, 30, 40, 50, 60, 70, 80]);

        $rowData = [
            'user_id' => $userId,
            'gender' => $gender,
            'generation' => $generation,
            'classification_type' => 'ver3',

            // 質問は28問
            'a01' => $this->faker->randomElement([10, 20, 30, 40]),
            'a02' => $this->faker->randomElement([10, 20, 30, 40]),
            'a03' => $this->faker->randomElement([10, 20, 30, 40]),
            'a04' => $this->faker->randomElement([10, 20, 30, 40]),
            'a05' => $this->faker->randomElement([10, 20, 30, 40]),
            'a06' => $this->faker->randomElement([10, 20, 30, 40]),
            'a07' => $this->faker->randomElement([10, 20, 30, 40]),
            'a08' => $this->faker->randomElement([10, 20, 30, 40]),
            'a09' => $this->faker->randomElement([10, 20, 30, 40]),
            'a10' => $this->faker->randomElement([10, 20, 30, 40]),

            'a11' => $this->faker->randomElement([10, 20, 30, 40]),
            'a12' => $this->faker->randomElement([10, 20, 30, 40]),
            'a13' => $this->faker->randomElement([10, 20, 30, 40]),
            'a14' => $this->faker->randomElement([10, 20, 30, 40]),
            'a15' => $this->faker->randomElement([10, 20, 30, 40]),
            'a16' => $this->faker->randomElement([10, 20, 30, 40]),
            'a17' => $this->faker->randomElement([10, 20, 30, 40]),
            'a18' => $this->faker->randomElement([10, 20, 30, 40]),
            'a19' => $this->faker->randomElement([10, 20, 30, 40]),
            'a20' => $this->faker->randomElement([10, 20, 30, 40]),

            'a21' => $this->faker->randomElement([10, 20, 30, 40]),
            'a22' => $this->faker->randomElement([10, 20, 30, 40]),
            'a23' => $this->faker->randomElement([10, 20, 30, 40]),
            'a24' => $this->faker->randomElement([10, 20, 30, 40]),
            'a25' => $this->faker->randomElement([10, 20, 30, 40]),
            'a26' => $this->faker->randomElement([10, 20, 30, 40]),
            'a27' => $this->faker->randomElement([10, 20, 30, 40]),
            'a28' => $this->faker->randomElement([10, 20, 30, 40]),

            'created_at' => $this->faker->dateTimeBetween($startDate = '-40 day', $endDate = 'now')
        ];

        // 集計値の設定
        EnergyHistoryFactory::editEnergyHistory($rowData); // 分類、合計、レベルを追加

        return $rowData;
    }

    ////////////////////////////////////////////////////////////////////////////////
    // 回答結果から、分類、合計、レベルを追加する。
    public static function editEnergyHistory(&$record)
    {
        $mental = 0;
        $physical = 0;
        $life = 0;
        $society = 0;

        $society += $record['a01'] ?? 0;
        $physical += $record['a02'] ?? 0;
        $society += $record['a03'] ?? 0;
        $mental += $record['a04'] ?? 0;
        $life += $record['a05'] ?? 0;
        $physical += $record['a06'] ?? 0;
        $life += $record['a07'] ?? 0;
        $mental += $record['a08'] ?? 0;
        $life += $record['a09'] ?? 0;
        $physical += $record['a10'] ?? 0;

        $society += $record['a11'] ?? 0;
        $mental += $record['a12'] ?? 0;
        $life += $record['a13'] ?? 0;
        $physical += $record['a14'] ?? 0;
        $society += $record['a15'] ?? 0;
        $mental += $record['a16'] ?? 0;
        $life += $record['a17'] ?? 0;
        $physical += $record['a18'] ?? 0;
        $society += $record['a19'] ?? 0;
        $mental += $record['a20'] ?? 0;

        $life += $record['a21'] ?? 0;
        $physical += $record['a22'] ?? 0;
        $society += $record['a23'] ?? 0;
        $mental += $record['a24'] ?? 0;
        $society += $record['a25'] ?? 0;
        $physical += $record['a26'] ?? 0;
        $life += $record['a27'] ?? 0;
        $mental += $record['a28'] ?? 0;

        $total = $mental + $physical + $life + $society;
        $level = StressCheckController::checkLevel($total);

        $record['mental'] = $mental;
        $record['physical'] = $physical;
        $record['life'] = $life;
        $record['society'] = $society;
        $record['total'] = $total;
        $record['level'] = $level;
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
