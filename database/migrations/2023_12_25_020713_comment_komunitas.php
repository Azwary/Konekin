<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('comment_komunitas', function (Blueprint $table) {
            $table->string('id_comment',5);
            $table->string('email',50);
            $table->string('id_komunitas',10);
            $table->text('comment');

            $table->primary(['id_comment']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('comment_komunitas');
    }
};
