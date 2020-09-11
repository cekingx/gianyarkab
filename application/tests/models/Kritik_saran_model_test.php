<?php

/**
 * @group model
 */
class Kritik_saran_model_test extends TestCase
{
    public static function setUpBeforeClass()
    {
        parent::setUpBeforeClass();

        $CI =& get_instance();
        $CI->load->library('seeder');
        $CI->seeder->call('KritikSaranSeeder');
    }

    public function setUp()
    {
        $this->resetInstance();
        $this->CI->load->model('kritik_saran_model');
        $this->obj = $this->CI->kritik_saran_model;
    }

    public function test_WhenGetAllKritikSaranThenGetOneKritikSaran()
    {
        $output = $this->obj->getAll();
        $this->assertCount(1, $output);
    }

    public function test_WhenSetKritikSaranThenGetTwoKritikSaran()
    {
        $_POST = [
            'kritik_saran_nama' => 'Nila',
            'kritik_saran_alamat' => 'Buleleng',
            'kritik_saran_email' => 'nila@buleleng.com',
            'kritik_saran_judul' => 'Lemot',
            'kritik_saran_isi' => 'Internet lemot'
        ];
        $output = $this->obj->save();

        $this->assertTrue($output);
        $this->assertCount(2, $this->obj->getAll());
    }

    public function test_WhenGetKritikSaranByIdThenGetTheSpecificKritikSaran()
    {
        $output = $this->obj->getById(2);
        $this->assertEquals('Nila', $output['kritik_saran_nama']);
        $this->assertEquals('Buleleng', $output['kritik_saran_alamat']);
    }

    public function test_WhenUpdateKritikSaranThenKritikSaranChanged()
    {
        $kritik_saran = $this->obj->getById(2);
        $kritik_saran['kritik_saran_alamat'] = 'Umajero';

        $_POST = [
            'kritik_saran_nama' => $kritik_saran['kritik_saran_nama'],
            'kritik_saran_alamat' => $kritik_saran['kritik_saran_alamat'],
            'kritik_saran_email' => $kritik_saran['kritik_saran_email'],
            'kritik_saran_judul' => $kritik_saran['kritik_saran_judul'],
            'kritik_saran_isi' => $kritik_saran['kritik_saran_isi'],
            'old_kritik_saran_foto' => $kritik_saran['kritik_saran_foto'],
        ];

        $status = $this->obj->update(2);
        $output = $this->obj->getById(2);

        $this->assertTrue($status);
        $this->assertEquals('Umajero', $output['kritik_saran_alamat']);
    }

    public function test_WhenDeleteKritikSaranThenGetOneKritikSaran()
    {
        $output = $this->obj->delete(2);
        $this->assertTrue($output);
        $this->assertCount(1, $this->obj->getAll());
    }
}