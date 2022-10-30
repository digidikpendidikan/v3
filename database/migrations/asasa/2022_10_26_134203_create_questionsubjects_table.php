<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questionsubjects', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('questioncategory_id');
            $table->string('nama'); //nama bab
            $table->string('slug'); //slug bab
            $table->text('deskripsi'); //deskripsinya
            $table->text('icon'); //icon
            $table->unsignedInteger('prioritas')->nullable(); //1 2 3
            $table->boolean('isQuiz')->default(1); //status aktif
            $table->boolean('status')->default(1); //status aktif
            $table->timestamps();
            $table->foreign('questioncategory_id')->references('id')->on('questioncategories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questionsubjects');
    }
}
