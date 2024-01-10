<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjetsTable extends Migration
{
    public function up()
    {
        Schema::create('projets', function (Blueprint $table) {
            $table->id();
            // Clés étrangères
            $table->foreignId('users_id')->constrained("users");
            $table->foreignId('type_projets_id')->constrained("type_projets");
            $table->string('nomProjet');
            $table->text('description')->nullable();
            $table->date('dateDébut');
            $table->date('dateFin');
            $table->string('statut')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::table("projets", function(Blueprint $table){
            $table->dropForeign("users_id");
            $table->dropForeign("type_projets_id");
        });
        Schema::dropIfExists('projets');
    }
}
