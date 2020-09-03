<?php

/**
 * @group model
 */
class Alamat_instansi_model_test extends TestCase
{
    public static function setUpBeforeClass()
    {
        parent::setUpBeforeClass();

        $CI =& get_instance();
        $CI->load->library('Seeder');
        $CI->seeder->call('AlamatInstansiSeeder');
    }
    
    public function setUp()
    {
        $this->resetInstance();
        $this->CI->load->model('alamat_instansi_model');
        $this->obj = $this->CI->alamat_instansi_model;
    }

    public function test_WhenGetAllAlamatInstansiThenGetOneAlamatInstansi()
    {
        $output = $this->obj->getAll();
        $this->assertCount(1, $output);
    }

    public function test_WhenSetAlamatInstansiThenGetTwoAlamatInstansi()
    {
        $_POST = [
            'alamat_instansi_nama' => 'DPMPTSP',
            'alamat_instansi_alamat' => 'Jln. Ngurah Rai',
            'alamat_instansi_telp' => '081234',
            'alamat_instansi_email' => 'dpmptsp@gianyarkab.go.id'
        ];
        $output = $this->obj->save();

        $this->assertTrue($output);
        $this->assertCount(2, $this->obj->getAll());
    }

    public function test_WhenGetAlamatInstansiByIdThenGetTheSpecificAlamatInstansi()
    {
        $output = $this->obj->getById(2);
        $this->assertEquals('DPMPTSP', $output['alamat_instansi_nama']);
        $this->assertEquals('Jln. Ngurah Rai', $output['alamat_instansi_alamat']);
    }

    public function test_WhenUpdateAlamatInstansiThenAlamatInstansiChanged()
    {
        $alamat_instansi_id = 2;
        $alamat_instansi = $this->obj->getById($alamat_instansi_id);
        $alamat_instansi['alamat_instansi_alamat'] = 'Jalan Ngurah Rai';
        
        $_POST = [
            'alamat_instansi_nama' => $alamat_instansi['alamat_instansi_nama'],
            'alamat_instansi_alamat' => $alamat_instansi['alamat_instansi_alamat'],
            'alamat_instansi_telp' => $alamat_instansi['alamat_instansi_telp'],
            'alamat_instansi_email' => $alamat_instansi['alamat_instansi_email']
        ];

        $status = $this->obj->update($alamat_instansi_id);
        $output = $this->obj->getById($alamat_instansi_id);

        $this->assertTrue($status);
        $this->assertEquals('Jalan Ngurah Rai', $output['alamat_instansi_alamat']);
    }

    public function test_WhenDeleteAlamatInstansiThenGetOneAlamatInstansi()
    {
        $alamat_instansi_id = 2;
        $output = $this->obj->delete($alamat_instansi_id);

        $this->assertTrue($output);
        $this->assertCount(1, $this->obj->getAll());
    }
}