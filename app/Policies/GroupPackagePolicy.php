<?php

namespace App\Policies;

use App\Models\User;
use App\Models\GroupPackage;
use Illuminate\Auth\Access\HandlesAuthorization;

class GroupPackagePolicy extends Policy
{
    use HandlesAuthorization;

    public function update(User $user, GroupPackage $group_package)
    {
        // return $group_package->user_id == $user->id;
        return true;
    }

    public function destroy(User $user, GroupPackage $group_package)
    {
        // return $group_package->user_id == $user->id;
        return true;
    }
}
