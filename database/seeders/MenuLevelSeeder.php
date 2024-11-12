<?php

namespace Database\Seeders;

use App\Models\MenuLevel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Monolog\Level;

class MenuLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MenuLevel::create([
            'level' => 'menu'
        ]);
        MenuLevel::create([
            'level' => 'submenu'
        ]);
    }
}
