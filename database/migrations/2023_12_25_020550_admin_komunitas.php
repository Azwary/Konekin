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
        Schema::create('admin_komunitas', function (Blueprint $table) {
            $table->string('email');
            $table->string('id_komunitas',10);
            // $table->date('created_date');
            // $table->date('updated_date');
            $table->timestamps();
            $table->primary(['email', 'id_komunitas']);

            // $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('admin_komunitas');
    }
};
