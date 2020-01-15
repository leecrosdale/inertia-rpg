<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('players', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->string('username');
            $table->integer('level')->default(1);
            $table->integer('experience')->default(0);
            $table->integer('health')->default(100);
            $table->integer('max_health')->default(100);
            $table->integer('attack')->default(1);
            $table->integer('defence')->default(1);
            $table->integer('kills')->default(0);
            $table->integer('deaths')->default(0);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('players');
    }
}
