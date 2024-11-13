<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('joint', function (Blueprint $table) {
            // $table->id(); // Assuming you want an auto-incrementing primary key, if not, replace it with your custom primary key logic
            $table->string('id_komunitas', 10)->nullable();
            $table->string('KEY', 5)->nullable();
            $table->string('email', 50)->nullable();

            // Use a unique constraint instead of primary key if you don't want auto-incrementing
            $table->unique(['id_komunitas', 'KEY', 'email']);

            // Add timestamps if needed
            // $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('joint');
    }
};
