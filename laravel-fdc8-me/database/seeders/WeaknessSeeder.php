<?php

namespace Database\Seeders;

use App\Models\Weakness;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WeaknessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Typedata = [
            ['name'=>'Colourless','photo'=>"images\colourless.png"],
            ['name'=>'Darkness','photo'=>"images/darkness.png"],
            ['name'=>'Dragon','photo'=>"images/dragon.png"],
            ['name'=>'Fairy','photo'=>"images/fairy.png"],
            ['name'=>'Fighting','photo'=>"images/fighting.png"],
            ['name'=>'Fire','photo'=>"images/fire.png"],
            ['name'=>'Grass','photo'=>"images/grass.png"],
            ['name'=>'Lightning','photo'=>"images/lightning.png"],
            ['name'=>'Metal','photo'=>"images/metal.png"],
            ['name'=>'Psychic','photo'=>"images/psychic.png"],
            ['name'=>'Water','photo'=>"images/water.png"],
        ];
        // $name = ["Colourless", "Darkness", "Dragon", "Fairy", "Fighting", "Fire", "Grass", "Lightning", "Metal", "Pshychi", "Water"];

        foreach ($Typedata as $data) {
            Weakness::create([
                'name' => $data['name'],
                'photo' => $data['photo'],
                'created_at'=>now(),
                'updated_at'=>now(),
            ]);
        }
    }
}
