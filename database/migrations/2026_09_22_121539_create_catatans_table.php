<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('catatans', function (Blueprint $table) {
            $table->id();
            $table->text('content');
            $table->timestamps();
        });

        DB::table('catatans')->insert([
            [
                'content' => 'Mohon Sekretaris segera melengkapi arsip PDF Surat Keluar bulan ini.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'content' => 'Ganti bagan struktur organisasi jika masa kepengurusan baru telah disahkan.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'content' => 'Periksa menu Pesan Kontak secara berkala untuk merespon pertanyaan publik.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('catatans');
    }
};
