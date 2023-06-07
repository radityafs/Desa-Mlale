<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warga extends Model
{
    use HasFactory;

    protected $table = 'warga';

    protected $fillable = [
        "nik",
        "no_kk",
        "nama_lengkap",
        "jenis_kelamin",
        "tempat_lahir",
        "tanggal_lahir",
        "pendidikan",
        "pekerjaan",
        "status"
    ];
    
}
