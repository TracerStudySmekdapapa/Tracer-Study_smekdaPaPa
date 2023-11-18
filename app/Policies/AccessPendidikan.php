<?php

namespace App\Policies;

use App\Models\Pendidikan;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class AccessPendidikan
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function edit(User $user, Pendidikan $pendidikan)
    {
        return $user->id_user === $pendidikan->alumni->id_user ? Response::allow() : Response::denyWithStatus(404);
    }

    public function show(User $user, Pendidikan $pendidikan)
    {
        return $user->id_user === $pendidikan->alumni->id_user ? Response::allow() : Response::denyWithStatus(404);
    }
}
