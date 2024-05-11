<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $admin = Role::create(['name' => 'admin']);
        $member = Role::create(['name' => 'member']);

        $parentcategor = Permission::create(['name' => 'manage parent category']);
        $categor = Permission::create(['name' => 'manage category']);
        $library = Permission::create(['name' => 'manage library']);

        $permission = [
            $parentcategor,
            $categor,
            $library
        ];

        $admin->syncPermissions($permission);
    }
}
