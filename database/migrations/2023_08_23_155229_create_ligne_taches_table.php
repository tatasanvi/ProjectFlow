<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLigneTachesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ligne_taches', function (Blueprint $table) {
            $table->id();
            $table->foreignId('users_id')->constrained("users");
            //$table->foreignId('createur')->constrained("users");
            $table->foreignId('taches_id')->constrained("taches");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table("ligne_taches", function(Blueprint $table){
            $table->dropForeign("users_id");
            $table->dropForeign("taches_id");
        });


        Schema::dropIfExists('ligne_taches');
    }
}
