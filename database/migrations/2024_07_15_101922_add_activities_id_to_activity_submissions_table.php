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
            $table->unsignedBigInteger('activities_id')->after('labs_id');
            $table->foreign('activities_id')->references('id')->on('activities');
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
            $table->dropForeign(['activities_id']);
            $table->dropColumn('activities_id');
        });
    }
};
