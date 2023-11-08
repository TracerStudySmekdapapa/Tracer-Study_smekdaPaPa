<?php

namespace App\Models;

use App\Models\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendidikan extends Model
{
    use HasFactory, HasUuid;

    protected $table = "pendidikan";
    protected $primaryKey = "id_pendidikan";
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'nama_univ', 'fakultas', 'prodi', 'alamat_univ', 'id_pribadi'
    ];

    public function alumni()
    {
        return $this->belongsTo(Pribadi::class, 'id_pribadi');
    }
}
