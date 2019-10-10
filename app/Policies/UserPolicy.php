<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
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

    public function luckyDraw(User $user)
    {
        return $user->isAdmin();
    }

    public function resetDraw(User $user)
    {
        return $user->isAdmin();
    }
}
