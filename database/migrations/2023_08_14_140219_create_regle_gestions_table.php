<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegleGestionsTable extends Migration
{
    public function up()
    {
        Schema::create('regle_gestions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('type_projets_id')->nullable()->constrained("type_projets");
            $table->string('name');
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::table("regle_gestions", function(Blueprint $table){
            $table->dropForeign("type_projets_id");
        });
        Schema::dropIfExists('regle_gestions');
    }
}
