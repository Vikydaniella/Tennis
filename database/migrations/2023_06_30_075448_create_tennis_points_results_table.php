<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTennisPointsResultsTable extends Migration
{
    /*ßpublic function up()
    {
        Schema::create('tennis_points_results', function (Blueprint $table) {
            $table->unsignedBigInteger('tennis_id');
            $table->foreign('tennis_id')
                ->references('id')
                ->on('tennis')
                ->cascade('delete');
            $table->unsignedBigInteger('point_id');
            $table->foreign('point_id')
                ->references('id')
                ->on('point')
                ->cascade('delete');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    /*public function down()
    {
        Schema::dropIfExists('tennis_points_results');
    }*/
}
