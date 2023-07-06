<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('results', function (Blueprint $table) {
            $table->id();
            $table->string('tennis_id');
            $table->integer('player_one_score');
            $table->integer('player_two_score');
            $table->string('winner');
            $table->unsignedBigInteger('tennis_creator_id');
            $table->foreign('tennis_creator_id')
                ->references('id')
                ->on('tennis')
                ->cascade('delete');
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
        Schema::dropIfExists('results');
    }
}
