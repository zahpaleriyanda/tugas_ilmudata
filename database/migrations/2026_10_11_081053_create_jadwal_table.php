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
        Schema::create('jadwal', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dosen_id')->constrained('dosen')->restrictOnDelete();
            $table->foreignId('mata_kuliah_id')->constrained('mata_kuliah')->restrictOnDelete();
            $table->foreignId('kelas_id')->constrained('kelas')->restrictOnDelete();
            $table->string('tahun_ajaran', 9);          // contoh: 2026/2027
            $table->string('semester', 10);             // ganjil / genap
            $table->string('hari', 10);
            $table->time('jam_mulai');
            $table->time('jam_selesai');
            $table->string('ruangan')->nullable();
            $table->timestamps();

            $table->unique(['dosen_id', 'mata_kuliah_id', 'kelas_id', 'tahun_ajaran', 'semester'], 'jadwal_unik');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal');
    }
};
