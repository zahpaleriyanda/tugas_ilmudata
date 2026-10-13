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
        Schema::create('absensi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sesi_id')->constrained('sesi_absensi')->cascadeOnDelete();
            $table->foreignId('mahasiswa_id')->constrained('mahasiswa')->restrictOnDelete();
            $table->string('status', 10)->default('alpha'); // hadir / izin / sakit / alpha
            $table->dateTime('waktu')->nullable();
            $table->decimal('latitude', 10, 7)->nullable();
            $table->decimal('longitude', 10, 7)->nullable();
            $table->unsignedInteger('jarak')->nullable();   // meter dari titik sesi
            $table->string('ip_address', 45)->nullable();
            $table->string('device_hash', 64)->nullable();  // deteksi satu HP dipakai absen banyak NIM
            $table->timestamps();

            $table->unique(['sesi_id', 'mahasiswa_id']);
            $table->index(['sesi_id', 'device_hash']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absensi');
    }
};
