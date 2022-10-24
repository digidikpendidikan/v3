<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('username')->unique();
            $table->string('password');
            $table->unsignedBigInteger('poin')->default(200);
            $table->unsignedBigInteger('xp')->default(0);
            $table->string('hp')->nullable();
            $table->text('foto')->nullable();
            $table->string('jk')->nullable();
            $table->string('provinsi')->nullable();
            $table->string('jenjang')->nullable();
            $table->string('sekolah')->nullable();
            $table->text('bio')->nullable();
            $table->text('google_id')->nullable();
            $table->text('facebook_id')->nullable();
            $table->text('twitter_id')->nullable();
            $table->string('status')->default('active');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
