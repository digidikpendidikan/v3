<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuizsubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quizsubjects', function (Blueprint $table) {
            $table->id();
            $table->string('nama'); //nama bab
            $table->string('slug'); //slug bab
            $table->text('deskripsi'); //deskripsinya
            $table->unsignedBigInteger('chapters_id');
            $table->unsignedBigInteger('questionchapters_id');
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
        Schema::dropIfExists('quizsubjects');
    }
}
