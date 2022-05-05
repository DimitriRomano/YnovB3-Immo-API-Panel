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
                'password' => bcrypt('admin')
            ],
            [
                'role_id' => 2,
                'name' => 'user',
                'email' => 'user@test.com',
                'phone' => '0102030406',
                'image' => '/img/user.jpg',
                'password' => bcrypt('user')
            ]
        ]);
    }
}
