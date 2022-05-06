<?php

namespace Database\Seeders;

use App\Models\Reservation;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->faker = Faker::create();

        DB::table('users')->insert([
            [
                'role_id' => 1,
                'name' => 'admin',
                'email' => 'admin@test.com',
                'phone' => '0102030405',
                'image' => '/img/admin.jpg',
                'password' => bcrypt('admin'),
                'created_at' => now()
            ],
            [
                'role_id' => 2,
                'name' => 'user',
                'email' => 'user@test.com',
                'phone' => '0102030406',
                'image' => '/img/user.jpg',
                'password' => bcrypt('user'),
                'created_at' => now()
            ]
        ]);

        DB::table('reservations')->insert([
            [
                'user_id' => 2,
                'property_id' => 1,
                'status' => 'pending',
                'created_at' => now(),
            ],
            [
                'user_id' => 1,
                'property_id' => 6,
                'status' => 'pending',
                'created_at' => now(),
            ]
        ]);

        for ($i = 1; $i <=10; $i++){
            $user = User::factory()->create();

            $reservation = new Reservation();
            $reservation->user_id = $user->id;
            $reservation->property_id = $this->faker->numberBetween(1, 10);
            $reservation->status = 'pending';
            $reservation->save();
        }

    }
}
