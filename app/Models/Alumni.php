<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumni extends Model
{
    use HasFactory;
    protected $table = "alumni";

    protected $fillable = [
        'nisn',
        'no_telp',
        'tempat_lahir',
        'agama',
        'jenis_kelamin',
        'jurusan',
        'id_user'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user')->orderBy('name', 'ASC');
    }
}
