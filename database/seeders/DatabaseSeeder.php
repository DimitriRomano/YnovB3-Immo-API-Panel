<?php

namespace Database\Seeders;

use App\Models\Property;
use App\Models\Type;
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
        $this->call(UserSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(TypeSeeder::class);
        $this->call(CategoryFeatureSeeder::class);
        $this->call(PropertySeeder::class);
    }
}
