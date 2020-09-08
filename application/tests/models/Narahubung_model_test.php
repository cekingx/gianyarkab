<?php

class Narahubung_model_test extends TestCase
{
    public static function setUpBeforeClass()
    {
        parent::setUpBeforeClass();

        $CI =& get_instance();
        $CI->db->truncate('ref_narahubung');
    }

    public function setUp()
    {
        $this->resetInstance();
        $this->CI->load->model('narahubung_model');
        $this->obj = $this->CI->narahubung_model;
    }

    public function test_WhenGetDataThenGetEmpty()
    {
        $output = $this->obj->get();
        $this->assertEmpty($output);
    }

    public function test_WhenSaveNarahubungThenGetOneNarahubung()
    {
        $_POST = [
            'narahubung_email' => 'cekingx@gmail.com',
            'narahubung_telp' => '0881037989613',
            'narahubung_fax' => 'test',
            'narahubung_alamat' => 'sidan'
        ];
        $status = $this->obj->save();
        
        $this->assertTrue($status);
    }

    public function test_WhenSaveNewNarahubungThenOldNarahubungChanged()
    {
        $_POST = [
            'narahubung_email' => 'cekingx2@gmail.com',
            'narahubung_telp' => '085857287403',
            'narahubung_fax' => 'test2',
            'narahubung_alamat' => 'gianyar'
        ];
        $status = $this->obj->save();
        $output = $this->obj->get();

        $this->assertTrue($status);
        $this->assertEquals('test2', $output['narahubung_fax']);
    }
}