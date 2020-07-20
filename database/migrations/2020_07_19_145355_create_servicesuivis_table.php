<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesuivisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servicesuivis', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom');
            $table->integer('telephone');
            $table->string('ville');
            $table->string('sexe');
            $table->integer('age')->nullable();
            $table->string('situation_familiale');
            $table->string('km_parcouru');
            $table->string('type_route');
            $table->string('places');
            $table->string('bagages');
            $table->string('type_usage');
            $table->string('type_carburant')->nullable();
            $table->string('budget');
            $table->string('type_financement');
            $table->boolean('idee_crédit');
            $table->string('voiture_preference')->nullable();
            $table->string('pourquoi_voiture_preference')->nullable();
            $table->string('type_voiture');
            $table->string('pourquoi_type_voiture')->nullable();
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
        Schema::dropIfExists('servicesuivis');
    }
}
