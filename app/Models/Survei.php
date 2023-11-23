<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Survei extends Model
{
    use HasFactory;
    protected $table = 'survei';
    protected $fillable = [
        'pertanyaan'
    ];

    public function jawaban()
    {
        return $this->hasMany(JawabanSurvei::class);
    }
}
