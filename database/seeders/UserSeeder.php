<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        $user = \App\Models\User::find(1); // Replace with the actual user ID
        if ($user) {
            $user->role = 'admin'; // Set the role to admin
            $user->save();
        } else {
            echo 'User with ID 1 does not exist.';
        }
    }
}
