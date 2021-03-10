<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SystemConfig;


class SystemConfigSeeder extends Seeder
{
    public function run()
    {
        SystemConfig::create(
            [
                'config' => [
                    'title' => '后盾人',
                ],
            ]
        );
    }
}
