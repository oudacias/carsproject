<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVoituresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('voitures', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('boutique_id')->nullable();
            $table->string('marque');
            $table->string('model');
            $table->string('version');
            $table->string('carburant');
            $table->string('boite_vitesse');
            $table->string('annee');
            $table->string('origine');
            $table->string('kilometrage');
            $table->string('couleur');
            $table->string('carrosserie');
            $table->string('nbr_porte');
            $table->string('puissance_fiscale');
            $table->string('premiere_main');
            $table->boolean('prepare');
            $table->string('description');
            $table->float('prix');
            $table->string('options');
            $table->string('ville');
            $table->string('type')->default('neuve');
            $table->boolean('vendu')->default(false);
            $table->string('photo');
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
        Schema::dropIfExists('voitures');
    }
}
