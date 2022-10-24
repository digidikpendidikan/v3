<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('chapter_id');
            $table->string('nama'); //Fungsi Trigonometri
            $table->string('slug'); //trigonometri
            $table->text('video'); //sematan video
            $table->text('durasi')->nullable(); //durasi video
            $table->text('deskripsi'); //deskripsinya
            $table->string('pengajar'); //nama pengajarnya
            $table->unsignedInteger('prioritas')->nullable(); //1 2 3
            $table->text('icon')->nullable(); //matematika
            $table->text('penjelasan')->nullable(); //isi penjelasan
            $table->text('modul')->nullable(); //link modul
            $table->unsignedInteger('suka')->default(0); //jumlah suka
            $table->unsignedInteger('tayang')->default(0); //jumlah tayang
            $table->boolean('status')->default(1); //status aktif
            $table->timestamps();
            $table->foreign('chapter_id')->references('id')->on('chapters')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('videos');
    }
}
