<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionchaptersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questionchapters', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('questionsubject_id');
            $table->string('nama'); //nama bab
            $table->string('slug'); //slug bab
            $table->text('deskripsi'); //deskripsinya
            $table->unsignedInteger('prioritas')->nullable(); //1 2 3
            $table->boolean('isQuiz')->default(1); //status aktif
            $table->boolean('status')->default(1); //status aktif
            $table->timestamps();
            $table->foreign('questionsubject_id')->references('id')->on('questionsubjects')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questionchapters');
    }
}
