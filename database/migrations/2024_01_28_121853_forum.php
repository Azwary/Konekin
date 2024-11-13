<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('forum', function (Blueprint $table) {
            $table->id();
            $table->string('id_komunitas',10);
            $table->string('KEY',5);
            $table->text('comment');

            // $table->primary(['id_comment']);
            // $table->unique(['id_kegiatan','email']);
            $table->timestamps();

        });
    }

    public function down()
    {
        Schema::dropIfExists('forum');
    }
};
