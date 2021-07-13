<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inscriptions', function (Blueprint $table) {
            $table->id();
            $table->foreignId("id_student")->constrained("students")->onDelete("cascade");
            $table->foreignId("master_id")->constrained("masters")->onDelete("cascade");
            $table->float("score_dossier")->nullable();
            $table->float("score_orale")->nullable();
            $table->float("score_finale")->nullable();
            $table->enum("annuler",["oui","non"])->nullable();
            $table->enum("etat",["accepter","refuser","en_attente"])->nullable();



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inscriptions');
    }
}
