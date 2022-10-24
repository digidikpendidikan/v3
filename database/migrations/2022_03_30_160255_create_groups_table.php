<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    // KELAS

    public function up()
    {
        Schema::create('groups', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('level_id');
            $table->string('nama'); //Kelas 10 SMA
            $table->string('slug'); //x
            $table->unsignedInteger('prioritas')->nullable(); //1 2 3
            $table->boolean('status')->default(1); //status aktif
            $table->unsignedInteger('tayang')->default(0); //jumlah tayang
            $table->timestamps();
            $table->foreign('level_id')->references('id')->on('levels')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('groups');
    }
}
