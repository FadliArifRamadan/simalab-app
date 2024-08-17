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
        Schema::table('activity_submissions', function (Blueprint $table) {
            $table->unsignedBigInteger('coordinators_id')->nullable()->after('users_id');
            $table->foreign('coordinators_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('activity_submissions', function (Blueprint $table) {
            $table->dropForeign(['coordinators_id']);
            $table->dropColumn('coordinators_id');
        });
    }
};
