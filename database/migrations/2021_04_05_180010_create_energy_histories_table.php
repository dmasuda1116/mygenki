<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnergyHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('energy_histories', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->nullable()->constrained()->cascadeOnDelete()->cascadeOnUpdate();

            $table->string('gender')->nullable(); // male/female
            $table->integer('generation')->nullable(); // 20、30、...、50、60

            $table->string('classification_type')->default('ver0'); // その時の質問の分類 1のときは質問Xは社会に分類されるとか

            // StresCheckの回答
            $table->integer('a01')->nullable();
            $table->integer('a02')->nullable();
            $table->integer('a03')->nullable();
            $table->integer('a04')->nullable();
            $table->integer('a05')->nullable();
            $table->integer('a06')->nullable();
            $table->integer('a07')->nullable();
            $table->integer('a08')->nullable();
            $table->integer('a09')->nullable();
            $table->integer('a10')->nullable();

            $table->integer('a11')->nullable();
            $table->integer('a12')->nullable();
            $table->integer('a13')->nullable();
            $table->integer('a14')->nullable();
            $table->integer('a15')->nullable();
            $table->integer('a16')->nullable();
            $table->integer('a17')->nullable();
            $table->integer('a18')->nullable();
            $table->integer('a19')->nullable();
            $table->integer('a20')->nullable();

            $table->integer('a21')->nullable();
            $table->integer('a22')->nullable();
            $table->integer('a23')->nullable();
            $table->integer('a24')->nullable();
            $table->integer('a25')->nullable();
            $table->integer('a26')->nullable();
            $table->integer('a27')->nullable();
            $table->integer('a28')->nullable();
            $table->integer('a29')->nullable();
            $table->integer('a30')->nullable();

            $table->integer('total')->default(0);
            $table->integer('level')->default(0);
            $table->integer('mental')->default(0);
            $table->integer('physical')->default(0);
            $table->integer('life')->default(0);
            $table->integer('society')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('energy_histories');
    }
}
