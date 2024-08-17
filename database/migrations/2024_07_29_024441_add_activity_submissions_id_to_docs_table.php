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
            $table->unsignedBigInteger('activity_submissions_id')->nullable()->after('id');
            $table->foreign('activity_submissions_id')->references('id')->on('activity_submissions');
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
            $table->dropForeign(['activity_submissions_id']);
            $table->dropColumn('activity_submissions_id');
        });
    }
};
