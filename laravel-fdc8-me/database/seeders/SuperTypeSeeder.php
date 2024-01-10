<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SuperTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $name = ['Energy','Pokemon','Trainer'];
        foreach ($name as $names) {
            DB::table('super_types')->insert([
                'name' => $names,
                'created_at'=>now(),
            ]);
        }
    }
}
