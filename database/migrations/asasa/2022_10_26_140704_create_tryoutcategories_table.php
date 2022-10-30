<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTryoutcategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tryoutcategories', function (Blueprint $table) {
            $table->id();
            $table->string('nama'); //nama kategori
            $table->string('slug'); //slug kategori
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
        Schema::dropIfExists('tryoutcategories');
    }
}
