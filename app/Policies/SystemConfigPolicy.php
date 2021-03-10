<?php

namespace App\Policies;

use App\Models\User;
use App\Models\SystemConfig;
use Illuminate\Auth\Access\HandlesAuthorization;

class SystemConfigPolicy extends Policy
{
    use HandlesAuthorization;

    public function update(User $user, SystemConfig $system_config)
    {
        // return $system_config->user_id == $user->id;
        return true;
    }

    public function destroy(User $user, SystemConfig $system_config)
    {
        // return $system_config->user_id == $user->id;
        return true;
    }
}
