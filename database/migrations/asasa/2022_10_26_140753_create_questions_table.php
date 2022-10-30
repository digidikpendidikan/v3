<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tryout_id')->nullable();
            $table->integer('nomor');//nomor soal
            $table->boolean('isRandomSubject')->default(0);
            $table->boolean('isRandomChapter')->default(0);
            $table->unsignedBigInteger('questiondetails_id')->nullable();
            $table->integer('penambah')->default('1');//penambah jika benar
            $table->integer('pengurang')->default('0');//pengurang jika salah
            $table->timestamps();
            $table->foreign('questiondetails_id')->references('id')->on('questiondetails')->onDelete('cascade');
            $table->foreign('tryout_id')->references('id')->on('tryout')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions');
    }
}
