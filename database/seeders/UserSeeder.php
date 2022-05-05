<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
                'user_id' => 1,
                'property_id' => 1,
                'status' => 'pending',
                'created_at' => now(),
            ],
            [
                'user_id' => 2,
                'property_id' => 1,
                'status' => 'pending',
                'created_at' => now(),
            ],
            [
                'user_id' => 1,
                'property_id' => 3,
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
    }
}
