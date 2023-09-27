<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumni extends Model
{
    use HasFactory;
    protected $table = "alumni";
    protected $primaryKey = "id_alumni";

    protected $fillable = [
        'nisn',
        'no_telp',
        'tempat_lahir',
        'tanggal_lahir',
        'agama',
        'jenis_kelamin',
        'jurusan',
        'angkatan',
        'id_user'
    ];

    public function scopeFilter($query, array $filters)
    {
        // dd($query);
        $query->when($filters['name'] ?? false, function ($query, $name){
            return $query->where('users.name', 'like', "%$name%");
        });

        $query->when($filters['angkatan'] ?? false, function ($query, $angkatan){
            return $query->where('angkatan', 'like', "%$angkatan%");
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user')->orderBy('name', 'ASC');
    }

    public function pekerjaan()
    {
        return $this->hasMany(Pekerjaan::class, 'id_alumni');
    }
}
