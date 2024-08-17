<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('docs', function (Blueprint $table) {
            $table->unsignedBigInteger('visitors_id')->nullable()->after('users_id');
            $table->foreign('visitors_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('docs', function (Blueprint $table) {
            $table->dropForeign(['visitors_id']);
            $table->dropColumn('visitors_id');
        });
    }
};
