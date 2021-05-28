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
        Schema::create('annescolaires', function (Blueprint $table) {
            $table->id();
            $table->integer("annee")->nullable();
            $table->float("moyenne")->nullable();
            $table->enum("mention",["Pas de mention","Assez bien","Bien","très bien"])->nullable();
            $table->enum("session",["controle","principale"])->nullable();
            $table->foreignId("etablissement_id")->nullable()->constrained("etablissements")->onDelete("cascade");
            $table->foreignId("universite_id")->nullable()->constrained("universites")->onDelete("cascade");
            $table->foreignId("filiere_id")->nullable()->constrained("filieres")->onDelete("cascade");
            $table->enum("niveau",["premiere","deuxieme","troisieme","quateriéme"])->nullable();
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
