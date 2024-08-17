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
        Schema::create('activity_submissions', function (Blueprint $table) {
            $table->id();
            $table->date('submission_date')->nullable();
            $table->time('submission_time')->nullable();
            $table->enum('status', ['Pending', 'Approved', 'Progress', 'Rejected', 'Done'])->default('Pending')->nullable();
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
        Schema::dropIfExists('activity_submissions');
    }
};
