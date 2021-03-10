<?php

namespace App\Services\Site;

use App\Models\Site;

class SiteService
{
    public function getSiteByDomain(): ?site
    {
        $host = parse_url(request()->url())['host'];

        return Site::where('domain', 'like', "%{$host}%")->first();
    }
}
