<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAffecterEnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('affecter_ens', function (Blueprint $table) {
            $table->id();
            $table->foreignId("id_enseignant")->nullable()->constrained("teachers")->onDelete("cascade");
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
        Schema::dropIfExists('affecter_ens');
    }
}
