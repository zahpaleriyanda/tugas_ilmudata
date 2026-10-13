<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $table = 'jadwal';
    
    protected $guarded = [];

    public function dosen() { return $this->belongsTo(Dosen::class); }
    public function mataKuliah() { return $this->belongsTo(MataKuliah::class); }
    public function kelas() { return $this->belongsTo(Kelas::class); }
    public function sesi() { return $this->hasMany(SesiAbsensi::class); }
}
