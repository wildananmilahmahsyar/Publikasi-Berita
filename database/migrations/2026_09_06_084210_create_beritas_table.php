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
        Schema::create('beritas', function (Blueprint $table) {
            $table->id();

            $table->string('title');

            $table->string('category');

            $table->string('divisi');

            $table->string('lokasi');

            $table->date('tanggal_kegiatan');

            $table->boolean('is_proker')->default(false);

            $table->string('image');

            $table->longText('content');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beritas');
    }
};