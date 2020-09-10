<?php

class Kontak_model_test extends TestCase
{
    public static function setUpBeforeClass()
    {
        parent::setUpBeforeClass();

        $CI =& get_instance();
        $CI->load->library('Seeder');
        $CI->seeder->call('KontakPersonSeeder');
    }
    
    public function setUp()
    {
        $this->resetInstance();
        $this->CI->load->model('kontak_model');
        $this->obj = $this->CI->kontak_model;
    }

    public function test_WhenGetAllKontakThenGetOneKontak()
    {
        $output = $this->obj->getAll();
        $this->assertCount(1, $output);
    }

    public function test_WhenSetKontakThenGetTwoKontak()
    {
        $_POST = [
            'kontak_person_nama' => 'Nila',
            'kontak_person_alamat' => 'buleleng',
            'kontak_person_email' => 'nila@example.com',
            'kontak_person_judul' => 'BLT tak sampai',
            'kontak_person_isi_aduan' => 'Saya tidak mendapatkan blt'
        ];
        $output = $this->obj->save();

        $this->assertTrue($output);
        $this->assertCount(2, $this->obj->getAll());
    }

    public function test_WhenGetKontakByIdThenGetTheSpecificKontak()
    {
        $output = $this->obj->getById(2);
        $this->assertEquals('Nila', $output['kontak_person_nama']);
        $this->assertEquals('buleleng', $output['kontak_person_alamat']);
    }

    public function test_WhenUpdateKontakThenKontakChanged()
    {
        $kontak_person_id = 2;
        $kontak_person = $this->obj->getById($kontak_person_id);
        $kontak_person['kontak_person_alamat'] = 'gianyar';
        
        $_POST = [
            'kontak_person_nama' => $kontak_person['kontak_person_nama'],
            'kontak_person_alamat' => $kontak_person['kontak_person_alamat'],
            'kontak_person_email' => $kontak_person['kontak_person_email'],
            'kontak_person_judul' => $kontak_person['kontak_person_judul'],
            'kontak_person_isi_aduan' => $kontak_person['kontak_person_isi_aduan']
        ];

        $status = $this->obj->update($kontak_person_id);
        $output = $this->obj->getById($kontak_person_id);

        $this->assertTrue($status);
        $this->assertEquals('gianyar', $output['kontak_person_alamat']);
    }

    public function test_WhenDeleteKontakThenGetOneKontak()
    {
        $kontak_person_id = 2;
        $output = $this->obj->delete($kontak_person_id);

        $this->assertTrue($output);
        $this->assertCount(1, $this->obj->getAll());
    }
}