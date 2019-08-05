<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEtapeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etape', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nom_etape');
            $table->date('date_reception');
            $table->date('date_envoie');
            $table->integer('id_document');
            $table->foreign('id_document')->references('id')->on('documents')->onDelete('cascade');
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
        Schema::dropIfExists('etape');
    }
}
