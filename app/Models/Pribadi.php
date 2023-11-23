<?php

namespace App\Models;

use App\Models\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pribadi extends Model
{
    use HasFactory, HasUuid;
    protected $table = "data_pribadi";
    protected $primaryKey = "id_pribadi";
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'nisn', 'no_telp', 'tempat_lahir', 'tanggal_lahir', 'agama',
        'jenis_kelamin', 'tamatan', 'id_jurusan', 'id_user'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user')->orderBy('name', 'ASC');
    }

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class, 'id_jurusan');
    }

    public function pekerjaan()
    {
        return $this->hasMany(Pekerjaan::class, 'id_pribadi');
    }

    public function pendidikan()
    {
        return $this->hasMany(Pendidikan::class, 'id_pribadi');
    }
}
