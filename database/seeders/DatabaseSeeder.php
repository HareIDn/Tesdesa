<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       $this->call([
        RolePermissionSeeder::class,

        PengajuanSeeder::class,
        JadwalSeeder::class,
        NotifikasiSeeder::class,
        DokumenSeeder::class,

       ]);


    }
}
