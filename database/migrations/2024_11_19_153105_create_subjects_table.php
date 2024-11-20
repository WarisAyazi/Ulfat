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
        Schema::create('subjects', function (Blueprint $table) {
            $table->bigIncrements('subjectID');
            $table->string('subName');
            $table->string('subLanguage');
            $table->integer('year');
            $table->unsignedBigInteger('teachers_id');
            $table->unsignedBigInteger('times_id');
            $table->timestamps();
            $table->foreign('teachers_id')->references('teacherID')->on('teachers')->ondelete('casecade');
            $table->foreign('times_id')->references('timeID')->on('times')->ondelete('casecade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subjects');
    }
};
