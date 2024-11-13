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
        Schema::create('Kegiatan', function (Blueprint $table) {
            $table->string('id_komunitas',10);
            $table->string('id_kegiatan',5);
            $table->string('nama_kegiatan');
            $table->text('detail_kegiatan');
            $table->date('tgl_kegiatan');
            $table->time('jam_kegiatan');
            $table->string('slug');
            $table->text('gallery');

            $table->primary(['id_kegiatan']);
            // $table->unique(['id_komunitas']);

            // $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('Kegiatan');
    }
};
