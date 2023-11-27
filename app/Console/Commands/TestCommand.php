<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\EnergyHistory;

class TestCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'テスト用コマンド';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        echo "------ Start\n";



        // fillableかguardedのどちらかを指定する必要あり
        // protected $fillable = ['classification_type'];
        $EnergyHistory = new EnergyHistory();
        $EnergyHistory->fill(['classification_type' => 'ver3']);
        $EnergyHistory->save();



        echo "------ End\n";
        return 0;
    }
}
