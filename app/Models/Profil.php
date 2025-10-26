<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Media;

class Profil extends Model
{
    use HasFactory;

    // Tentukan nama tabel jika berbeda dari konvensi
    protected $table = 'profils';

    // Primary key sesuai migration: profil_id (auto-increment integer)
    protected $primaryKey = 'profil_id';
    public $incrementing = true;
    protected $keyType = 'int';

    // Kolom yang boleh diisi mass-assignment (exclude primary key yang auto-increment)
    protected $fillable = [
        'nama_desa',
        'kecamatan',
        'kabupaten',
        'provinsi',
        'alamat_kantor',
        'email',
        'telepon',
        'visi',
        'misi',
    ];

    /**
     * Relasi ke media (satu profil bisa punya banyak media)
     */
    public function media()
    {
        return $this->hasMany(Media::class, 'ref_id', 'profil_id')->where('ref_table', 'profils');
    }

    /**
     * Accessor: ambil file_url media pertama sebagai 'logo' jika ada.
     */
    public function getLogoAttribute()
    {
        $m = $this->media()->orderBy('sort_order')->first();
        return $m ? $m->file_url : null;
    }
}
