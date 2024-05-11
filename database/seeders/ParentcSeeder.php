<?php

namespace Database\Seeders;

use App\Models\Parentc;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ParentcSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Parentc::truncate();
        Parentc::create([
            'name' => 'ar',
        ]);
        Parentc::create([
            'name' => 'en',
        ]);
    }
}
