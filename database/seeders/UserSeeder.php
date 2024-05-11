<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Traits\HasRoles;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // User::truncate();
        $adminuser = User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin1234'),

        ]);
        $adminuser->assignRole('admin');
        $user = User::create([
            'name' => 'username',
            'email' => 'username@gmail.com',
            'password' => Hash::make('user1234'),

        ]);
        $user->assignRole('member');
    }
}
