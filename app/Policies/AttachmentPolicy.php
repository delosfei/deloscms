<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Attachment;
use Illuminate\Auth\Access\HandlesAuthorization;

class AttachmentPolicy extends Policy
{
    use HandlesAuthorization;

    public function update(User $user, Attachment $attachment)
    {
        // return $attachment->user_id == $user->id;
        return true;
    }

    public function destroy(User $user, Attachment $attachment)
    {
        // return $attachment->user_id == $user->id;
        return true;
    }
}
