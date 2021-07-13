<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DateInscrit extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('date_inscrit', function (Blueprint $table) {
            $table->id();
            $table->foreignId("id_a")->nullable()->constrained("anneuniversitaires")->onDelete("cascade");
            $table->foreignId("master_id")->nullable()->constrained("masters")->onDelete("cascade");
            $table->string("date_debut")->nullable();
            $table->string("date_fin")->nullable();


        });}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
