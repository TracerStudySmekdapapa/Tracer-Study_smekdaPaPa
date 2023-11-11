<?php

namespace App\Policies;

use App\Models\Pekerjaan;
use App\Models\Pribadi;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class AccessPekerjaan
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function view(User $pribadi, Pekerjaan $pekerjaan)
    {
        return $pribadi->id_user === $pekerjaan->pribadi->id_user ? Response::allow() : Response::denyWithStatus(404);
    }
}
