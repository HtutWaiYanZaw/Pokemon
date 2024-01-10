<?php

namespace Database\Seeders;

use App\Models\SubType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $name = [
            "Ancient", "BREAK", "Baby", "Basic", "EX",
            "Eternamax",
            "Fusion Strike",
            "Future",
            "GX",
            "Item",
            "LEGEND",
            "MEGA",
            "Prime",
            "Radiant",
            "Restored",
            "Special",
            "Stadium",
            "Star",
            "Supporter",
            "Tera",
            "V-UNION",
            "VMAX",
            "VSTAR"
        ];
        foreach ($name as $n) {
            SubType::create([
                'name' => $n,
                'created_at' => now()
            ]);
        }
    }
}
