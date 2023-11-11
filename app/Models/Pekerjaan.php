<?php

namespace App\Models;

use App\Models\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pekerjaan extends Model
{
    use HasFactory, HasUuid;

    protected $table = 'pekerjaan';
    protected $primaryKey = 'id_pekerjaan';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'nama_pekerjaan',
        'nama_instansi',
        'alamat_instansi',
        'jabatan',
        'thn_masuk',
        'thn_keluar',
        'id_pribadi'
    ];

    public function pribadi()
    {
        return $this->belongsTo(Pribadi::class, 'id_pribadi');
    }
}
