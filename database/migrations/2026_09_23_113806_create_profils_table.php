<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('profils', function (Blueprint $table) {
            $table->id();
            $table->text('sejarah');
            $table->text('visi');
            $table->text('misi');
            $table->string('structure_image')->nullable();

            $table->string('nilai_1_title');
            $table->text('nilai_1_desc');

            $table->string('nilai_2_title');
            $table->text('nilai_2_desc');

            $table->string('nilai_3_title');
            $table->text('nilai_3_desc');

            $table->timestamps();
        });

        DB::table('profils')->insert([
            'sejarah' => "Didirikan pada tahun 1998, organisasi ini berawal dari semangat sekumpulan pemuda yang ingin memberikan kontribusi nyata bagi masyarakat melalui penyebaran informasi yang akurat dan edukatif. Selama lebih dari dua dekade, kami telah bertransformasi dari komunitas lokal menjadi organisasi profesional yang berfokus pada pengembangan jurnalistik dan publikasi kegiatan positif.\n\nKami percaya bahwa setiap kegiatan kecil memiliki dampak besar jika dikomunikasikan dengan baik. Melalui platform Sistem Informasi Publikasi Berita ini, kami berkomitmen untuk terus menjaga transparansi dan profesionalisme dalam setiap dokumentasi agenda organisasi.",

            'visi' => 'Menjadi organisasi publikasi informasi terdepan yang independen, edukatif, dan mampu menginspirasi perubahan positif di masyarakat melalui karya jurnalistik yang berkualitas.',

            'misi' => "Menyajikan berita kegiatan organisasi yang akurat, cepat, dan berimbang.\nMengembangkan kompetensi anggota dalam bidang jurnalistik dan teknologi informasi.\nMembangun jejaring komunikasi yang efektif antar divisi dan pihak eksternal.\nMemanfaatkan teknologi digital untuk optimalisasi penyebaran informasi organisasi.",

            'structure_image' => null,

            'nilai_1_title' => 'Integritas',
            'nilai_1_desc' => 'Menjunjung tinggi kejujuran dan etika dalam setiap informasi yang dipublikasikan.',

            'nilai_2_title' => 'Kolaborasi',
            'nilai_2_desc' => 'Bekerja sama secara harmonis antar divisi demi mencapai tujuan organisasi.',

            'nilai_3_title' => 'Inovasi',
            'nilai_3_desc' => 'Selalu beradaptasi dengan perkembangan teknologi informasi terkini.',

            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('profils');
    }
};