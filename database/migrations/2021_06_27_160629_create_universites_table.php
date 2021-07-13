<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUniversitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('universites', function (Blueprint $table) {
            $table->id();
            $table->enum("universite",["Universite de tunis",
                "Universite de manouba",
                "Universite de tunis el manar",
                "Université de carthage",
                "Universite ez-zitouna",
                "Universite de sousse",
                "Université de sfax",
                "Universite de jendouba",
                "Universite de gabes",
                "Direction générale des études technologiques",
                "Université de monastir",
                "Université de kairouan",
                "Université de gafsa",
                "Autre"
            ]);
            $table->string('autre')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('universites');
    }
}
