<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateConversationsTable extends Migration
{
    public function up()
    {
        Schema::create('conversations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('projets_id')->constrained("projets");
            $table->string('titre');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::table("conversations", function(Blueprint $table){
            $table->dropForeign("projets_id");
        });
        Schema::dropIfExists('conversations');
    }
}
