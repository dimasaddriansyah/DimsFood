<?php

namespace Tests\Feature;

use App\pengguna;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CobaTest extends TestCase
{
    use DatabaseMigrations;

    public function testTambahPengguna()
    {
        $pengguna = factory(pengguna::class)->make();
        $this->actingAs($pengguna);
        $dataPengguna = [
            'name' => 'Kapal Selam',
            'price' => '10000',
            'qty' => '10'
        ];
    }
    public function testTambahPenggunaDenganDataSalah()
    {
        $pengguna = factory(pengguna::class)->make();
        $this->actingAs($pengguna);
        $dataPengguna = [
            'name' => '',
            'price' => '10000',
            'qty' => '10'
        ];
        $message_Json = [
            'message' => $dataPengguna['name'] . " Berhasil Dibuat"
        ];
        $this->post(route('products.store', $dataPengguna))->assertStatus(302)->assertSessionHasErrors('name');
    }
}
