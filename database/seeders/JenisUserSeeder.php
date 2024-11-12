<?php

namespace Database\Seeders;

use App\Models\JenisUser;
use GuzzleHttp\Promise\Create;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JenisUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        JenisUser::create([
            'jenis_user' => 'admin'
        ]);
        JenisUser::create([
            'jenis_user' => 'staff'
        ]);
        JenisUser::create([
            'jenis_user' => 'pengguna'
        ]);
    }
}
