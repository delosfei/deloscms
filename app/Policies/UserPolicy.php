<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy extends Policy
{
    use HandlesAuthorization;

    public function update(User $user)
    {
        // return $user->user_id == $user->id;
        return true;
    }

    public function destroy(User $user)
    {
        // return $user->user_id == $user->id;
        return true;
    }

}
