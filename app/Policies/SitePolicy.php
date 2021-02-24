<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Site;
use Illuminate\Auth\Access\HandlesAuthorization;

class SitePolicy extends Policy
{
    use HandlesAuthorization;

    public function update(User $user, Site $site)
    {
        // return $site->user_id == $user->id;
        return true;
    }

    public function destroy(User $user, Site $site)
    {
        // return $site->user_id == $user->id;
        return true;
    }
}
