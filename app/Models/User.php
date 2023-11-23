<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
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

    public function pribadi()
    {
        return $this->hasMany(Pribadi::class, 'id_pribadi');
    }


    public function getFirstNameAttribute()
    {
        $fullName = $this->attributes['name'];
        $nameParts = explode(' ', $fullName);

        return $nameParts[0];
    }

    public function scopeDataAlumni($query)
    {
        $query = $query->whereHas('roles', fn ($q) => $q->where('name', 'Alumni'))
            ->join('data_pribadi', 'users.id_user', '=', 'data_pribadi.id_user')
            ->leftJoin('jurusan', 'data_pribadi.id_jurusan', '=', 'jurusan.id_jurusan')
            ->leftJoin(DB::raw("(SELECT id_pribadi, COUNT(DISTINCT id_pekerjaan) as total_pekerjaan FROM pekerjaan GROUP BY id_pribadi) as pekerjaan"), 'data_pribadi.id_pribadi', '=', 'pekerjaan.id_pribadi')
            ->leftJoin(DB::raw("(SELECT id_pribadi, COUNT(DISTINCT id_pendidikan) as total_pendidikan FROM pendidikan GROUP BY id_pribadi) as pendidikan"), 'data_pribadi.id_pribadi', '=', 'pendidikan.id_pribadi')
            ->select([
                'users.*',
                'data_pribadi.*',
                'jurusan.*',
                DB::raw("CASE WHEN pekerjaan.total_pekerjaan > 0 THEN 'true' ELSE 'false' END as hasJob"),
                DB::raw("CASE WHEN pendidikan.total_pendidikan > 0 THEN 'true' ELSE 'false' END as hasPendidikan")
            ])
            ->orderBy('users.name', 'ASC');
    }

    public function scopeSurvei($query)
    {
        $query = $query->whereHas('roles', fn ($q) => $q->where('name', 'Alumni'))
            ->join('data_pribadi', 'users.id_user', '=', 'data_pribadi.id_user')
            ->leftJoin('jurusan', 'data_pribadi.id_jurusan', '=', 'jurusan.id_jurusan')
            ->whereHas('jawaban', function ($query) {
                $query->whereNotNull('id_user');
            });
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when(
            isset($filters['status']) && !in_array($filters['status'], ['semua', 'bekerja', 'pendidikan']),
            function ($query) {
                $query->whereHas('roles', fn ($q) => $q->where('name', 'Alumni'))
                    ->join('data_pribadi', 'users.id_user', '=', 'data_pribadi.id_user')
                    ->leftJoin('jurusan', 'data_pribadi.id_jurusan', '=', 'jurusan.id_jurusan')
                    ->leftJoin(DB::raw("(SELECT id_pribadi, COUNT(DISTINCT id_pekerjaan) as total_pekerjaan FROM pekerjaan GROUP BY id_pribadi) as pekerjaan"), 'data_pribadi.id_pribadi', '=', 'pekerjaan.id_pribadi')
                    ->leftJoin(DB::raw("(SELECT id_pribadi, COUNT(DISTINCT id_pendidikan) as total_pendidikan FROM pendidikan GROUP BY id_pribadi) as pendidikan"), 'data_pribadi.id_pribadi', '=', 'pendidikan.id_pribadi')
                    ->select([
                        'users.*',
                        'data_pribadi.*',
                        'jurusan.*',
                        DB::raw("CASE WHEN pekerjaan.total_pekerjaan > 0 THEN 'true' ELSE 'false' END as hasJob"),
                        DB::raw("CASE WHEN pendidikan.total_pendidikan > 0 THEN 'true' ELSE 'false' END as hasPendidikan")
                    ])
                    ->orderBy('users.name', 'ASC');
            }
        );
        $query->when(isset($filters['status']) && $filters['status'] == 'semua', function ($query) {
            $query->whereHas('roles', fn ($q) => $q->where('name', 'Alumni'))
                ->join('data_pribadi', 'users.id_user', '=', 'data_pribadi.id_user')
                ->leftJoin('jurusan', 'data_pribadi.id_jurusan', '=', 'jurusan.id_jurusan')
                ->leftJoin(DB::raw("(SELECT id_pribadi, COUNT(DISTINCT id_pekerjaan) as total_pekerjaan FROM pekerjaan GROUP BY id_pribadi) as pekerjaan"), 'data_pribadi.id_pribadi', '=', 'pekerjaan.id_pribadi')
                ->leftJoin(DB::raw("(SELECT id_pribadi, COUNT(DISTINCT id_pendidikan) as total_pendidikan FROM pendidikan GROUP BY id_pribadi) as pendidikan"), 'data_pribadi.id_pribadi', '=', 'pendidikan.id_pribadi')
                ->select([
                    'users.*',
                    'data_pribadi.*',
                    'jurusan.*',
                    DB::raw("CASE WHEN pekerjaan.total_pekerjaan > 0 THEN 'true' ELSE 'false' END as hasJob"),
                    DB::raw("CASE WHEN pendidikan.total_pendidikan > 0 THEN 'true' ELSE 'false' END as hasPendidikan")
                ])
                ->orderBy('users.name', 'ASC');
        });

        $query->when(isset($filters['status']) && $filters['status'] == 'bekerja', function ($query) {
            $query->whereHas('roles', function ($query) {
                $query->where('name', 'Alumni');
            })
                ->join('data_pribadi', 'users.id_user', '=', 'data_pribadi.id_user')
                ->join(
                    DB::raw("(SELECT id_pribadi, COUNT(DISTINCT id_pekerjaan) as total_pekerjaan FROM pekerjaan GROUP BY id_pribadi) as pekerjaan"),
                    'data_pribadi.id_pribadi',
                    '=',
                    'pekerjaan.id_pribadi'
                );

            $query->select([
                'users.*',
                'data_pribadi.*',
                DB::raw("CASE WHEN pekerjaan.total_pekerjaan > 0 THEN 'true' ELSE 'false' END as hasJob")
            ])
                ->orderBy('users.name', 'ASC');

            $query->leftJoin('jurusan', 'data_pribadi.id_jurusan', '=', 'jurusan.id_jurusan')
                ->leftJoin(DB::raw("(SELECT id_pribadi, COUNT(DISTINCT id_pendidikan) as total_pendidikan FROM pendidikan GROUP BY id_pribadi) as pendidikan"), 'data_pribadi.id_pribadi', '=', 'pendidikan.id_pribadi')
                ->addSelect([
                    'jurusan.*',
                    DB::raw("CASE WHEN pendidikan.total_pendidikan > 0 THEN 'true' ELSE 'false' END as hasPendidikan")
                ]);
        });

        $query->when(isset($filters['status']) && $filters['status'] == 'pendidikan', function ($query) {
            $query->whereHas('roles', function ($query) {
                $query->where('name', 'Alumni');
            })
                ->join('data_pribadi', 'users.id_user', '=', 'data_pribadi.id_user')
                ->join(
                    DB::raw("(SELECT id_pribadi, COUNT(DISTINCT id_pendidikan) as total_pendidikan FROM pendidikan GROUP BY id_pribadi) as pendidikan"),
                    'data_pribadi.id_pribadi',
                    '=',
                    'pendidikan.id_pribadi'
                );

            $query->select([
                'users.*',
                'data_pribadi.*',
                DB::raw("CASE WHEN pendidikan.total_pendidikan > 0 THEN 'true' ELSE 'false' END as hasPendidikan")
            ])
                ->orderBy('users.name', 'ASC');

            $query->leftJoin('jurusan', 'data_pribadi.id_jurusan', '=', 'jurusan.id_jurusan')
                ->leftJoin(DB::raw("(SELECT id_pribadi, COUNT(DISTINCT id_pekerjaan) as total_pekerjaan FROM pekerjaan GROUP BY id_pribadi) as pekerjaan"), 'data_pribadi.id_pribadi', '=', 'pekerjaan.id_pribadi')
                ->addSelect([
                    'jurusan.*',
                    DB::raw("CASE WHEN pekerjaan.total_pekerjaan > 0 THEN 'true' ELSE 'false' END as hasJob")
                ]);
        });

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

    public function scopeSearch($query, array $filters)
    {
        $query = $query->whereHas('roles', function ($query) {
            $query->where('name', 'Alumni');
        })->join('data_pribadi', 'users.id_user', '=', 'data_pribadi.id_user')
            ->leftJoin('jurusan', 'data_pribadi.id_jurusan', '=', 'jurusan.id_jurusan')
            ->orderBy('users.name', 'ASC');

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

    public function scopeTidakAlumni($query)
    {
        return $query->whereDoesntHave('roles', function ($query) {
            $query->whereIn('name', ['Alumni', 'Admin']);
        })
            ->join('data_pribadi', 'users.id_user', '=', 'data_pribadi.id_user')
            ->orderBy('users.name', 'ASC');
    }


    public function jawaban()
    {
        return $this->hasMany(JawabanSurvei::class, 'id_user');
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
