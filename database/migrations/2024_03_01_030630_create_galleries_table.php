<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('galleries', function (Blueprint $table) {
            $table->id();
            $table->string('id_komunitas',10);
            $table->string('image_path');
            $table->timestamps();

            // $table->foreign('id_komunitas')->references('id_komunitas')->on('your_komunitas_table_name')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('galleries');
    }
};
