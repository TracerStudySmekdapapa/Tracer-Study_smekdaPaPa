<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pekerjaan extends Model
{
    use HasFactory;

    protected $table = 'pekerjaan';
    protected $primaryKey = 'id_pekerjaan';

    protected $fillable = [
        'nama_pekerjaan',
        'nama_instansi',
        'alamat_instansi',
        'jabatan',
        'thn_masuk',
        'thn_keluar',
        'id_alumni'
    ];
    
    public function alumni()
    {
        return $this->belongsTo(Alumni::class, 'id_alumni');
    }    
}
