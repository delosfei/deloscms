<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Site;
use Illuminate\Auth\Access\HandlesAuthorization;

class SitePolicy extends Policy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return true;
    }

    public function view(User $user, Site $site)
    {
        return $user['id'] == $site->user_id;
    }

    public function update(User $user, Site $site)
    {
        return $site->user_id == $user->id;
    }

    public function destroy(User $user, Site $site)
    {
        return $site->user_id == $user->id;
    }
}
