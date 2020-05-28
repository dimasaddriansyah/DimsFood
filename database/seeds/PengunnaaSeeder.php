<?php

use Illuminate\Database\Seeder;
use App\pengguna;

class PengunnaaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        pengguna::create([
            'name' => 'Pengguna',
            'email' => 'pengguna@gmail.com',
            'password' => bcrypt('pengguna')
        ]);
    }
}
