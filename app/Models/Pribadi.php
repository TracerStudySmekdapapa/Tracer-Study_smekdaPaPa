<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pribadi extends Model
{
    use HasFactory;
    protected $table = "data_pribadi";
    protected $primaryKey = "id_pribadi";

    protected $fillable = [
        'nisn',
        'no_telp',
        'tempat_lahir',
        'tanggal_lahir',
        'agama',
        'jenis_kelamin',
        'jurusan',
        'tamatan',
        'id_user'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user')->orderBy('name', 'ASC');
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
