<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePieceJointesTable extends Migration
{
    public function up()
    {
        Schema::create('piece_jointes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('taches_id')->nullable()->constrained("taches");
            $table->string('filename');
            $table->decimal('file_size', 8, 2);
            $table->string('file_path')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::table("piece_jointes", function(Blueprint $table){
            $table->dropForeign("tache_id");
        });
        Schema::dropIfExists('piece_jointes');
    }
}
