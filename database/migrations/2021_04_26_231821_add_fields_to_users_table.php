<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string("last_name");
            $table->enum("role",["admin","student","teacher"])->default("student");
            $table->unsignedInteger("cin")->nullable();
            $table->enum("sexe",["h","f"])->nullable();
            $table->date("birthday")->nullable();
            $table->string("birth_adresse")->nullable();
            $table->string("adresse")->nullable();
            $table->string("city")->nullable();
            $table->string("postal_code")->nullable();
            $table->string("phone")->nullable();
            $table->string("profession")->nullable();
            $table->string("company")->nullable();
            $table->string("avatar")->nullable();
            $table->boolean("status")->default();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
