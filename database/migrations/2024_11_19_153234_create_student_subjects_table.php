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
        Schema::create('student_subjects', function (Blueprint $table) {
            $table->unsignedBigInteger('subjects_id');
            $table->unsignedBigInteger('students_id');
            $table->foreign('subjects_id')->references('subjectID')->on('subjects')->ondelete('casecade');
            $table->foreign('students_id')->references('studentID')->on('students')->ondelete('casecade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_subjects');
    }
};
