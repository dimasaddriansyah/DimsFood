<?php

namespace Database\Seeders;

use App\Models\Users;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Users::create([
            'name' => 'User',
            'email' => 'user@gmail.com',
            'password' => bcrypt('user'),
            'address' => 'Indramayu',
            'phone_number' => '089514321234',
        ]);
        Users::create([
            'name' => 'Arif Muthohari',
            'email' => 'arif@gmail.com',
            'password' => bcrypt('arif'),
            'address' => 'Indramayu',
            'phone_number' => '089514321234',
        ]);
        Users::create([
            'name' => 'Triana Dyah Pangestuti',
            'email' => 'triana@gmail.com',
            'password' => bcrypt('triana'),
            'address' => 'Indramayu',
            'phone_number' => '089514321234',
        ]);
    }
}
