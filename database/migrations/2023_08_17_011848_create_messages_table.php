<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            // Clés étrangères
            $table->foreignId('users_id')->constrained("users");
            $table->foreignId('conversations_id')->constrained("conversations");
            $table->text('message');
            $table->timestamp('timestamp')->useCurrent();
            $table->boolean('is_read')->default(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::table("messages", function(Blueprint $table){
            $table->dropForeign("users_id");
            $table->dropForeign("conversations_id");
        });
        Schema::dropIfExists('messages');
    }
}
