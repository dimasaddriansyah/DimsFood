<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\pengguna;

class TestPengguna extends TestCase
{
    use DatabaseTransactions;
    
    public function testAddData()
    {
        $pengguna = pengguna::create([
            'name' => 'dadang',
            'email' => 'dadang@gmail.com'
        ]);
    
        $this->assertDatabaseHas('pengguna',[
            'name' => 'dadang',
            'email' => 'dadang@gmail.com',
        ]);
    
    }
}
