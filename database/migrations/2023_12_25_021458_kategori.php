<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {   
        Schema::create('kategori', function (Blueprint $table) {
            $table->string('id_kategori',5);
            $table->string('nama_kategori');
            
            $table->primary(['id_kategori']);
            
            // $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('kategori');
    }
};
