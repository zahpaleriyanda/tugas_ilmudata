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
        Schema::create('sesi_absensi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jadwal_id')->constrained('jadwal')->restrictOnDelete();
            $table->unsignedTinyInteger('pertemuan_ke');
            $table->string('token', 64)->unique();      // identitas sesi di URL QR
            $table->string('secret', 64);               // untuk QR dinamis (token berganti tiap beberapa detik)
            $table->dateTime('mulai');
            $table->dateTime('selesai');
            $table->string('status', 10)->default('aktif'); // aktif / ditutup
            $table->decimal('latitude', 10, 7);
            $table->decimal('longitude', 10, 7);
            $table->unsignedSmallInteger('radius')->default(100); // meter
            $table->timestamps();

            $table->unique(['jadwal_id', 'pertemuan_ke']);
            $table->index(['status', 'selesai']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sesi_absensi');
    }
};
