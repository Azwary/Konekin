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
        Schema::create('komunitas', function (Blueprint $table) {
            // $table->id(); // Auto-increment ID
            // $table->string('id_komunitas',5)->unique(); // Kolom ID dengan kombinasi "KOM" + nomor auto-increment// Kolom ID dengan kombinasi "KOM" + nomor auto-increment
            // $table->string('id_komunitas',5)->change();
            $table->string('id_komunitas',10);
            $table->string('nama_komunitas');
            $table->text('image_komunitas');
            $table->string('description_komunitas',100);
            $table->string('id_kategori',5);
            $table->string('KEY',5);

            $table->primary(['id_komunitas']);
            // $table->unique(['KEY']);

            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::table('komunitas', function (Blueprint $table) {
            $table->dropColumn('id_komunitas');
        });
    }
};
