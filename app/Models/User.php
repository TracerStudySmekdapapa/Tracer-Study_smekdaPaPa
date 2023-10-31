<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    protected $primaryKey = 'id_user';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'bio',
        'profil_picture',
        'password',
    ];

    public function getFirstNameAttribute()
    {
        $fullName = $this->attributes['name'];
        $nameParts = explode(' ', $fullName);

        return $nameParts[0];
    }


    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where(function ($query) use ($search) {
                $query->where('name', 'like', "%$search%")
                    ->orWhere(function ($query) use ($search) {
                        $query->where('nisn', $search);
                    });
            });
        });
        $query->when($filters['tamatan'] ?? false, function ($query, $tamatan) {
            return $query->where('tamatan', 'like', "%$tamatan%");
        });
    }

    public function alumni()
    {
        return $this->hasMany(Pribadi::class, 'id_pribadi');
    }

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class, 'id_jurusan');
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
