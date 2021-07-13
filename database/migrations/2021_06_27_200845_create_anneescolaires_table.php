<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnneescolairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anneescolaires', function (Blueprint $table) {
            $table->id();


            $table->string("annee")->nullable();
            $table->float("moyenne")->nullable();
            $table->enum("mention",["passable","Assez bien","Bien","très bien"])->nullable();
            $table->enum("session",["controle","princiale"])->nullable();
            $table->enum("resultat",["admis","redoublant"])->nullable();

            $table->foreignId("etablissement_id")->nullable()->constrained("etablissements")->onDelete("cascade");
            $table->foreignId("universite_id")->nullable()->constrained("universites")->onDelete("cascade");
            $table->foreignId("filiere_id")->nullable()->constrained("filieres")->onDelete("cascade");
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
        Schema::dropIfExists('anneescolaires');
    }
}
