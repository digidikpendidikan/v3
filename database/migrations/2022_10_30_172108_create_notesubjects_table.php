<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotesubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notesubjects', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('notelevel_id');
            $table->string('nama'); //Sekolah Menengah Atas
            $table->string('slug'); //sma
            $table->text('deskripsi'); //penjelasan
            $table->text('icon'); //icon
            $table->unsignedInteger('prioritas')->nullable(); //1 2 3
            $table->boolean('status')->default(1); //status aktif
            $table->unsignedInteger('tayang')->default(0); //jumlah tayang
            $table->timestamps();
            $table->foreign('notelevel_id')->references('id')->on('notelevels')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notesubjects');
    }
}
