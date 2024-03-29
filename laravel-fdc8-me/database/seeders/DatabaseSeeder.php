<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([UserSeeder::class]);
        $this->call([SuperTypeSeeder::class]);
        $this->call([TypeSeeder::class]);
        $this->call([SubTypeSeeder::class]);
        $this->call([ResistanceSeeder::class]);
        $this->call([WeaknessSeeder::class]);

    }
}
