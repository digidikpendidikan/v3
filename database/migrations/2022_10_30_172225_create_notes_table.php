<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('notesubject_id');
            $table->string('judul'); //Sekolah Menengah Atas
            $table->string('slug'); //sma
            $table->text('deskripsi'); //penjelasan
            $table->boolean('status')->default(1); //status aktif
            $table->unsignedInteger('suka')->default(0); //jumlah tayang
            $table->unsignedInteger('tayang')->default(0); //jumlah tayang
            $table->timestamps();
            $table->foreign('notesubject_id')->references('id')->on('notesubjects')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notes');
    }
}
