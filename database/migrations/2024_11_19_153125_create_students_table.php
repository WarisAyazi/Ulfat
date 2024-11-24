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
        Schema::create('students', function (Blueprint $table) {
            $table->bigIncrements('studentID');
            $table->string('stuName');
            $table->string('stuFname');
            $table->string('gender');
            $table->unsignedBigInteger('subjects_id');
            $table->timestamps();
            $table->foreign('subjects_id')->references('subjectID')->on('subjects')->ondelete('casecade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
