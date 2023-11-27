<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // 列の追加
            $table->string('account_type')->default('user')->after('remember_token');
            $table->bigInteger('company_id')->nullable()->after('account_type');
            $table->string('gender')->nullable()->after('company_id');
            $table->integer('generation')->nullable()->after('gender');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('users');

        Schema::table('users', function (Blueprint $table) {
            // 列の削除
            $table->dropColumn('account_type');
            $table->dropColumn('company_id');
            $table->dropColumn('gender');
            $table->dropColumn('generation');
        });
    }
}
