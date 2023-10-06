<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendidikan extends Model
{
    use HasFactory;

    protected $table = "pendidikan";
    protected $primaryKey = "id_pendidikan";

    protected $fillable = [
        'nama_univ', 'fakultas', 'prodi', 'alamat_univ', 'id_alumni'
    ];

    public function alumni()
    {
        return $this->belongsTo(Alumni::class, 'id_alumni');
    }
}
