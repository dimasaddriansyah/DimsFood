<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\pengguna;

class PenggunaTest extends TestCase
{
    use DatabaseMigrations;
    use DatabaseTransactions;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testAddData()
    {
        $pengguna = pengguna::create([
            'name' => 'dadang',
            'email' => 'dadang@gmail.com',
            'password' => 'dadang1234',
            'alamat' => 'indramayu',
            'no_hp' => '08944232231',
        ]);

        $this->assertIsObject($pengguna);
    }

    public function testAddDataSalah()
    {
        $pengguna = pengguna::create([
            'name' => 1,
            'email' => 'dadang@gmail.com',
            'password' => 'dadang1234',
            'alamat' => 'indramayu',
            'no_hp' => '08944232231',
        ]);

        $this->assertDatabaseHas('pengguna', [
            'name' => 1,
            'email' => 'dadang@gmail.com',
            'password' => 'dadang1234',
            'alamat' => 'indramayu',
            'no_hp' => '08944232231',
        ]);
    }

    public function testEditData()
    {
        $pengguna = pengguna::create([
            'name' => 'Coba',
            'email' => 'cob@gmail.com',
            'password' => 'cob123',
            'alamat' => 'imy',
            'no_hp' => '089333333333'
        ]);

        $pengguna = pengguna::find(1);
        $pengguna->name = 'coba edit';
        $pengguna->email = 'coba@gmail.com';
        $pengguna->password = 'coba123';
        $pengguna->alamat = 'indramayu';
        $pengguna->no_hp = '089222222222';
        $pengguna->save();

        $this->assertDatabaseHas('pengguna', [
            'name' => 'coba edit',
            'email' => 'coba@gmail.com',
            'password' => 'coba123',
            'alamat' => 'indramayu',
            'no_hp' => '089222222222'
        ]);
    }

    public function testEditDataSalah()
    {
        $pengguna = pengguna::create([
            'name' => 1,
            'email' => 'cobas@gmail.com',
            'password' => 'cobas123',
            'alamat' => 'celeng',
            'no_hp' => '08726377777777'
        ]);

        $pengguna = pengguna::find(1);
        $pengguna->name = 1;
        $pengguna->email = 'cobasa@gmail.com';
        $pengguna->password = 'cobasa123';
        $pengguna->alamat = 'celeng';
        $pengguna->no_hp = '08912121212';
        $pengguna->save();

        $this->assertDatabaseHas('pengguna', [
            'name' => 1,
            'email' => 'cobasa@gmail.com',
            'password' => 'cobasa123',
            'alamat' => 'celeng',
            'no_hp' => '08912121212'
        ]);
    }
    public function testdestroylain()
    {

        $pengguna = pengguna::create([
            'name' => 'Coba salah',
            'email' => 'cobas@gmail.com',
            'password' => 'cobas123',
            'alamat' => 'celeng',
            'no_hp' => '08726377777777'
        ]);

        $exp = $pengguna->delete();
        $this->assertTrue($exp);
        $exp2 = $pengguna->delete();

        $this->assertNull($exp2);
    }
}
