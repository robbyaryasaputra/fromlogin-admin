<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warga extends Model
{
    use HasFactory;

    // Nama tabel (laravel default: wargas), set explicit jika ingin
    protected $table = 'wargas';

    // Primary key sesuai migration
    protected $primaryKey = 'warga_id';
    public $incrementing = true;
    protected $keyType = 'int';

    // Fillable properties untuk mass assignment (exclude primary key dan kolom yang tidak ada di migration)
    protected $fillable = [
        'no_ktp',
        'nama',
        'jenis_kelamin',
        'agama',
        'pekerjaan',
        'telp',
        'email',
    ];
}
