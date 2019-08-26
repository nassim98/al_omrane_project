<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('num_ordre')->unique();
            $table->date('date');
            $table->string('chef_responsable');
            $table->string('agence');
            $table->string('ville');
            $table->string('objet');
            $table->string('type');
            $table->string('note')->nullable();
            $table->string('fournisseur')->nullable();
            $table->string('scenario')->nullable();
            $table->boolean('archived')->default(0);
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
        Schema::dropIfExists('documents');
    }
}
