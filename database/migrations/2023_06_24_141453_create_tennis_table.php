<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTennisTable extends Migration
{
    public function up()
    {
        Schema::create('tennis', function (Blueprint $table) {
            $table->id();
            $table->string('tournament_name');
            $table->integer('tournament_point');
            $table->integer('number_of_players');
            $table->unsignedBigInteger('tennis_id');
            $table->foreign('tennis_id')
                ->references('id')
                ->on('users')
                ->cascade('delete');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tennis');
    }
}
