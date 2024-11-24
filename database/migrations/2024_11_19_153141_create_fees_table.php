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
        Schema::create('fees', function (Blueprint $table) {
            $table->bigIncrements('feeID');
            $table->integer('amount');
            $table->string('month');
            $table->integer('year');
            $table->unsignedBigInteger('subjects_id');
            $table->unsignedBigInteger('students_id');
            $table->unsignedBigInteger('teachers_id');
            $table->timestamps();
            $table->foreign('subjects_id')->references('subjectID')->on('subjects')->ondelete('casecade');
            $table->foreign('students_id')->references('studentID')->on('students')->ondelete('casecade');
            $table->foreign('teachers_id')->references('teacherID')->on('teachers')->ondelete('casecade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fees');
    }
};
