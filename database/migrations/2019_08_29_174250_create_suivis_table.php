<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuivisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suivis', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->integer('id_document');
            $table->foreign('id_document')->references('id')->on('documents')->onDelete('no action');
            $table->integer('id_scenario');
            $table->foreign('id_scenario')->references('id')->on('scenarios')->onDelete('no action');
            $table->integer('id_etape');
            $table->foreign('id_etape')->references('id')->on('etapes')->onDelete('no action');
            $table->dateTime('date');
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
        Schema::dropIfExists('suivis');
    }
}
