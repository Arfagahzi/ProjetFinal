<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDossiersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dossiers', function (Blueprint $table) {
            $table->id();
            $table->integer("Annee_bac")->nullable();
            $table->enum("bac",["informatique","mathematique","lettre","economie et gestion","technique","science"])->nullable();
            $table->float("moyenne_bac")->nullable();
            $table->enum("session_bac",["principale","controle"])->nullable();
            $table->enum("mention_bac",["passable","assez bien","Bien","très bien"])->nullable();
            $table->string("certificat_succee_bac")->nullable();
            $table->enum("nature-diplome",["licence applique","licence fondamentale","maitrise","ingenierie"])->nullable();
            $table->string("nom_diplome")->nullable();
            $table->string("date_diplome")->nullable();
            $table->string("img_diplome")->nullable();
            $table->string("img_cin_face1")->nullable();
            $table->string("img_cin_face2")->nullable();
            $table->string("img_reo")->nullable();
            $table->boolean("reo")->nullable();
            $table->foreignId("inscrit_id")->nullable()->constrained("inscriptions")->onDelete("cascade");


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dossiers');
    }
}
