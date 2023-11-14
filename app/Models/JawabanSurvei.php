<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JawabanSurvei extends Model
{
    use HasFactory;
    protected $table = 'jawaban_survei';
    protected $fillable = [
        'jawaban', 'id_pertanyaan', 'id_user'
    ];


    public function survei()
    {
        return $this->belongsTo(Survei::class, 'id_pertanyaan');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
