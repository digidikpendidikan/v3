<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    //Pelajarannya
    public function up()
    {
        Schema::create('subjects', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('group_id');
            $table->string('nama'); //Matematika
            $table->string('slug'); //matematika
            $table->text('deskripsi'); //matematika
            $table->text('icon'); //icon
            $table->string('pengajar'); //nama pengajarnya
            $table->string('gelarpengajar'); //gelar pengajarnya
            $table->text('fotopengajar'); //icon
            $table->string('kategori'); //umu ipa ips
            $table->text('durasi')->nullable(); //durasi video
            $table->unsignedInteger('prioritas')->nullable(); //1 2 3
            $table->boolean('status')->default(1); //status aktif
            $table->timestamps();
            $table->foreign('group_id')->references('id')->on('groups')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subjects');
    }
}
