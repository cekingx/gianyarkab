<?php

/**
 * @group model
 */

class Jabatanbupati_model_test extends TestCase
{
    public static function setUpBeforeClass()
    {
        parent::setUpBeforeClass();

        $CI =& get_instance();

        $CI->load->library('Seeder');
        $CI->seeder->call('JabatanBupatiSeeder');
    }

    public function setUp()
    {
        $this->resetInstance();
        $this->CI->load->model('jabatanbupati_model');
        $this->obj = $this->CI->jabatanbupati_model;
    }

    public function test_WhenGetAllJabatanBupatiThenGetOneJabatanBupati()
    {
        $output = $this->obj->getAll();
        $this->assertCount(1, $output);
    }

    public function test_WhenSetJabatanBupatiThenGetTwoJabatanBupati()
    {
        $_POST = [
            'jabatan_bupati_nama' => 'Nila',
            'jabatan_bupati_masa_jabatan' => '2000-2001',
            'jabatan_bupati_foto' => 'default.jpg'
        ];
        $output = $this->obj->save();

        $this->assertTrue($output);
        $this->assertCount(2, $this->obj->getAll());
    }

    public function test_WhenGetJabatanBupatiByIdThenGetTheSpecificJabatanBupati()
    {
        $output = $this->obj->getById(2);
        $this->assertEquals('Nila', $output['jabatan_bupati_nama']);
        $this->assertEquals('2000-2001', $output['jabatan_bupati_masa_jabatan']);
    }

    public function test_WhenUpdateJabatanBupatiThenJabatanBupatiChanged()
    {
        $jabatan_bupati_id = 2;
        $jabatan_bupati = $this->obj->getById($jabatan_bupati_id);
        $jabatan_bupati['jabatan_bupati_masa_jabatan'] = '2002-2003';

        $_POST = [
            'jabatan_bupati_nama' => $jabatan_bupati['jabatan_bupati_nama'],
            'jabatan_bupati_masa_jabatan' => $jabatan_bupati['jabatan_bupati_masa_jabatan'],
            'old_jabatan_bupati_foto' => $jabatan_bupati['jabatan_bupati_foto']
        ];

        $status = $this->obj->update($jabatan_bupati_id);
        $output = $this->obj->getByid($jabatan_bupati_id);
        $this->assertTrue($status);
        $this->assertEquals('2002-2003', $output['jabatan_bupati_masa_jabatan']);
    }

    public function test_WhenDeleteJabatanBupatiThenGetOneJabatanBupati()
    {
        $jabatan_bupati_id = 2;
        $output = $this->obj->delete($jabatan_bupati_id);
        $this->assertTrue($output);
        $this->assertCount(1, $this->obj->getAll());
    }
}