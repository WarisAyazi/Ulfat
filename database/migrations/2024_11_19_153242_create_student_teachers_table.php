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
        Schema::create('student_teachers', function (Blueprint $table) {
            $table->unsignedBigInteger('students_id');
            $table->unsignedBigInteger('teachers_id');
            $table->foreign('students_id')->references('studentID')->on('students')->ondelete('casecade');
            $table->foreign('teachers_id')->references('teacherID')->on('teachers')->ondelete('casecade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_teachers');
    }
};
