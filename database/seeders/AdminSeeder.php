<?php

namespace Database\Seeders;

use App\Models\Admins;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admins::create([
            'name' => 'Dimas Addriansyah',
            'email' => 'dimas@gmail.com',
            'password' => bcrypt('dimas'),
        ]);
        Admins::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
        ]);
    }
}
