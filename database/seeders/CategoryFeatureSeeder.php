<?php

namespace Database\Seeders;

use App\Models\CategoryFeature;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class CategoryFeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $catNames = ['Surfaces Annexe', 'Services et Accessibilité', 'Calme et Situation' , 'Divers'];
        $features = [];

        for($i = 0; $i < count($catNames); $i++) {

            DB::table('category_features')->insert([
                'name' => $catNames[$i],
            ]);

            switch ($catNames[$i]) {
                case ('Surfaces Annexe'):
                    $features = ['balcon ou terrasse', 'parking', 'jardin'];
                    break;

                case ('Services et Accessibilité'):
                    $features = ['ascenseur', 'climatiseur', 'fibre', 'gardien', 'piscine',];
                    break;

                case ('Calme et Situation'):
                    $features = ['exposition sud', 'double vitrage', 'résidence étudiants'];
                    break;

                case ('Divers'):
                    $features = ['cheminée', 'meublé'];
                    break;
            }

            foreach ($features as $feature) {

                DB::table('features')->insert([
                    'name' => $feature,
                    'icon' => '/img/icon_features/'.$feature.'.png',
                    'category_features_id' => $i + 1,
                ]);
            }
        }
    }
}
