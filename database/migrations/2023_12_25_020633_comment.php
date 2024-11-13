<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('comment', function (Blueprint $table) {
            $table->string('id_comment',5);
            $table->string('id_kegiatan',5);
            $table->string('email',50);
            $table->text('comment');

            // 
            $table->primary(['id_comment']);
            $table->unique(['id_kegiatan','email']);
            
        });
    }

    public function down()
    {
        Schema::dropIfExists('comment');
    }
};
