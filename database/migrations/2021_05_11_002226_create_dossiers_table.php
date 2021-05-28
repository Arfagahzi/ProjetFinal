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
            $table->string("bac")->nullable();
            $table->boolean("reo")->nullable();
            $table->float("moyenne_bac")->nullable();
            $table->string("nom_diplome")->nullable();
            $table->date("date_diplome")->nullable();
            $table->string("img_diplome")->nullable();
            $table->string("pays")->nullable();
            $table->string("img_cin")->nullable();
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
