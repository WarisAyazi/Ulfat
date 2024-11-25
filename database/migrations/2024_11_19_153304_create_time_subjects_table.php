<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('time_subjects', function (Blueprint $table) {
            $table->bigIncrements('timSubID');
            $table->unsignedBigInteger('subjects_id');
            $table->unsignedBigInteger('times_id');
            $table->foreign('subjects_id')->references('subjectID')->on('subjects')->ondelete('casecade');
            $table->foreign('times_id')->references('timeID')->on('times')->ondelete('casecade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('time_subjects');
    }
};
