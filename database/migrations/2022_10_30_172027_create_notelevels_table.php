<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotelevelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notelevels', function (Blueprint $table) {
            $table->id();
            $table->string('nama'); //Sekolah Menengah Atas
            $table->string('slug'); //sma
            $table->text('deskripsi'); //penjelasan
            $table->text('icon'); //icon
            $table->unsignedInteger('prioritas')->nullable(); //1 2 3
            $table->boolean('status')->default(1); //status aktif
            $table->unsignedInteger('tayang')->default(0); //jumlah tayang
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
        Schema::dropIfExists('notelevels');
    }
}
