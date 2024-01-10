<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateTachesTable extends Migration
{
    public function up()
    {
        Schema::create('taches', function (Blueprint $table) {
            $table->id();
            // Clés étrangères
            $table->foreignId('projets_id')->constrained("projets");
            $table->foreignId('users_id')->constrained("users");
            $table->string('nomTache');
            $table->text('description')->nullable();
            $table->date('dateDébut');
            $table->date('dateFin');
            $table->string('statut')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::table("taches", function(Blueprint $table){
            $table->dropForeign("users_id");
            $table->dropForeign("projets_id");
        });
        Schema::dropIfExists('taches');
    }
}
