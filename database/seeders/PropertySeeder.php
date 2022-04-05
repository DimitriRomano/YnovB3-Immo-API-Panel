<?php

namespace Database\Seeders;

use App\Models\Localisation;
use App\Models\Property;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Faker\Factory as Faker;

class PropertySeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            $property = new Property();
            $property->title = 'Property ' . $i;
            $property->description = $faker->paragraph($nbSentences = 3, $variableNbSentences = true);
            $property->price = $faker->numberBetween(70, 400). '000';
            $property->address = $faker->address;
            $property->surface = $faker->numberBetween(20, 200);
            $property->image = 'https://i.imgur.com/rBVJnRk.png';
            $property->type_id = $faker->numberBetween(1, 3);
            $property->save();

            $localisation = new Localisation();
            $localisation->latitude = $faker->latitude;
            $localisation->longitude = $faker->longitude;
            $localisation->property_id = $property->id;
            $localisation->save();
        }
        //Property::factory()->count(1)->create();

    }
}
