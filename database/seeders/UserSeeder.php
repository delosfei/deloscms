<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        $users = User::factory()->count(10)->create();
        $user = $users[0];
        $user['name'] = 'delos';
        $user['mobile'] = '15066223705';
        $user->save();
    }
}

