<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicediagnosticsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servicediagnostics', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('marque');
            $table->string('model');
            $table->string('version');
            $table->string('carburant');
            $table->string('boite_vitesse');
            $table->string('annee');
            $table->string('dedouane');
            $table->string('kilometrage');
            $table->string('couleur');
            $table->string('carrosserie');
            $table->string('nbr_porte');
            $table->string('puissance_fiscale');
            $table->string('premiere_main');
            $table->string('prepare');
            $table->string('photo');
            $table->boolean('confirmer')->default(false);
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
        Schema::dropIfExists('servicediagnostics');
    }
}
