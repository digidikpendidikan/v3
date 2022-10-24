<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLevelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    //JENJANG SD SMP SMA

    public function up()
    {
        Schema::create('levels', function (Blueprint $table) {
            $table->id();
            $table->string('nama'); //Sekolah Menengah Atas
            $table->string('slug'); //sma
            $table->text('deskripsi'); //penjelasan
            $table->unsignedInteger('prioritas')->nullable(); //1 2 3
            $table->boolean('status')->default(1); //status aktif
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
        Schema::dropIfExists('levels');
    }
}
