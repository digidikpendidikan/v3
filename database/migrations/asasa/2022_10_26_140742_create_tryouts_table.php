<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTryoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tryouts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tryoutcategory_id');
            $table->string('nama'); //nama bab
            $table->string('slug'); //slug bab
            $table->text('deskripsi'); //deskripsinya
            $table->text('syarat')->nullable(); //deskripsinya
            $table->text('panduan'); //deskripsinya
            $table->text('hadiah')->nullable(); //deskripsinya
            $table->string('durasi');
            $table->string('jumlahsoal');
            $table->text('icon'); //icon
            $table->date('mulai');
            $table->date('selesai');
            $table->string('menit');
            $table->string('token')->nullable();
            $table->boolean('serentak')->default(0);
            $table->unsignedInteger('prioritas')->nullable(); //1 2 3
            $table->boolean('status')->default(1); //status aktif
            $table->timestamps();
            $table->foreign('tryoutcategory_id')->references('id')->on('tryoutcategories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tryouts');
    }
}
