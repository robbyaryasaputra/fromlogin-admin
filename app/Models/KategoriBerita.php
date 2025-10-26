<?php

namespace App\Models;

use App\Models\KategoriBerita;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KategoriBerita extends Model
{
    use HasFactory;

    protected $table = 'kategori_beritas';
    protected $primaryKey = 'kategori_id';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'nama',
        'slug',
        'deskripsi',
    ];
}
