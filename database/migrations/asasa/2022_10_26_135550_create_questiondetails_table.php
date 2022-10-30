<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestiondetailssTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questiondetails', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('questionchapter_id');
            $table->text('soal'); //deskripsinya
            $table->text('opsi1'); //deskripsinya
            $table->text('opsi2'); //deskripsinya
            $table->text('opsi3'); //deskripsinya
            $table->text('opsi4'); //deskripsinya
            $table->text('opsi5'); //deskripsinya
            $table->string('jawaban'); //deskripsinya
            $table->text('penjelasan')->nullable(); //deskripsinya
            $table->text('video')->nullable(); //deskripsinya
            $table->unsignedInteger('prioritas')->nullable(); //1 2 3
            $table->boolean('isQuiz')->default(1); //status aktif
            $table->boolean('status')->default(1); //status aktif
            $table->timestamps();
            $table->foreign('questionchapter_id')->references('id')->on('questionchapters')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questiondetails');
    }
}
