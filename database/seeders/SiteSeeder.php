<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Site;

class SiteSeeder extends Seeder
{
    public function run()
    {
        $sites = Site::factory()->count(10)->create();
        $site = $sites[0];
        $site['title'] = '人人销';
        $site['domain'] = 'http://faw4s.com';
        $site->save();
    }
}

