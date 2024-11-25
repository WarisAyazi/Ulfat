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
        Schema::create('student_times', function (Blueprint $table) {
            $table->bigIncrements('stuTimID');
            $table->unsignedBigInteger('students_id');
            $table->unsignedBigInteger('times_id');
            $table->foreign('students_id')->references('studentID')->on('students')->ondelete('casecade');
            $table->foreign('times_id')->references('timeID')->on('times')->ondelete('casecade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_times');
    }
};
