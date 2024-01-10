<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTypeProjetsTable extends Migration
{

        public function up()

        {
            Schema::create('type_projets', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->text('description')->nullable();
                $table->foreignId('users_id')->constrained("users");
                $table->timestamps();
            });
        }

        public function down()
        {
            Schema::table("type_projets", function(Blueprint $table){
                $table->dropForeign("users_id");
            });
            Schema::dropIfExists('type_projets');
        }

}
