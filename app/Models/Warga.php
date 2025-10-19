<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warga extends Model
{
    use HasFactory;

    // Nama tabel (laravel default: wargas), set explicit jika ingin
    protected $table = 'wargas';

    // Fillable properties untuk mass assignment
    protected $fillable = [
        'warga_id',
        'no_ktp',
        'nama',
        'jenis_kelamin',
        'agama',
        'pekerjaan',
        'telp',
        'email',
        'alamat',
    ];
}
