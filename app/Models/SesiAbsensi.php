<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SesiAbsensi extends Model
{
    protected $table = 'sesi_absensi';

    protected $fillable = [
        'jadwal_id',
        'token',
        'waktu_mulai',
        'waktu_selesai',
    ];
}
