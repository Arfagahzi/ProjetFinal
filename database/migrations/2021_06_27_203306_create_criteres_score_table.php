<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCriteresScoreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('criteres_score', function (Blueprint $table) {
            $table->id();
            $table->string("critere")->nullable();
            $table->string("bonnus")->nullable();
            $table->string("coefficient")->nullable();
            $table->foreignId("master_id")->nullable()->constrained("masters")->onDelete("cascade");




        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('criteres_score');
    }
}
