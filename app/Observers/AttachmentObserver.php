<?php

namespace App\Observers;

use App\Models\Attachment;

// creating, created, updating, updated, saving,
// saved,  deleting, deleted, restoring, restored

class AttachmentObserver
{
    public function creating(Attachment $attachment)
    {
        //
    }

    public function updating(Attachment $attachment)
    {
        //
    }
}
