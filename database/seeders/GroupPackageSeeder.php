<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\GroupPackage;

class GroupPackageSeeder extends Seeder
{
    public function run()
    {
        GroupPackage::factory()->count(10)->create();
    }
}

