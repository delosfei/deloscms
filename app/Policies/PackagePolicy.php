<?php

namespace App\Policies;

use App\Models\Package;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PackagePolicy
{
    use HandlesAuthorization;

    public function before(User $user, $type)
    {
        if ($type != 'delete') {
            return $user->isSuperAdmin;
        }
    }

    public function viewAny(User $user)
    {
       
    }

    public function view(User $user, Package $package)
    {
    }

    public function create(User $user)
    {
    }

    public function update(User $user, Package $package)
    {
    }

    public function delete(User $user, Package $package)
    {
        return $user->isSuperAdmin && $package->id != 1;
    }
}
