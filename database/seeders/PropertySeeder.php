<?php

namespace Database\Seeders;

use App\Models\Feature;
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
            $property->main_image = $faker -> randomElement($array = array ('https://i.imgur.com/rBVJnRk.png','https://i.imgur.com/cGDjX9x.jpeg','https://i.imgur.com/k8BaoR8.jpeg', 'https://i.imgur.com/fnAFtvU.jpeg'));
            $property->type_id = $faker->numberBetween(1, 3);
            $property->save();

            $list_images = ['https://i.imgur.com/MFG251G.jpeg', 'https://i.imgur.com/3gfqoFF.jpeg', 'https://i.imgur.com/Vj9XnPX.jpeg'];

            foreach ($list_images as $image) {
                $property->images()->create([
                    'property_id' => $property->id,
                    'url' => $image
                ]);
            }

            $localisation = new Localisation();
            $localisation->latitude = $faker->latitude;
            $localisation->longitude = $faker->longitude;
            $localisation->property_id = $property->id;
            $localisation->save();

            $features = Feature::all();

            foreach ($features as $feature) {
                $chanceOfGettingTrue = rand(1, 100);
                if ($chanceOfGettingTrue < 60) {
                    $property->features()->attach($feature->id);
                }
            }
        }

    }
}
