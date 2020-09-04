<?php

/**
 * @group model
 */
class Subdomain_model_test extends TestCase
{
    public static function setUpBeforeClass()
    {
        parent::setUpBeforeClass();

        $CI =& get_instance();
        $CI->load->library('Seeder');
        $CI->seeder->call('SubDomainSeeder');
    }

    public function setUp()
    {
        $this->resetInstance();
        $this->CI->load->model('subdomain_model');
        $this->obj = $this->CI->subdomain_model;
    }

    public function test_WhenGetAllSubdomainThenGetOneSubdomain()
    {
        $output = $this->obj->getAll();
        $this->assertCount(1, $output);
    }

    public function test_WhenSetSubdomainThenGetTwoSubdomain()
    {
        $_POST = [
            'sub_domain_link' => 'dpmptsp.gianyarkab.go.id',
            'sub_domain_deskripsi' => 'Website resmi DPMPTSP'
        ];
        $output = $this->obj->save();

        $this->assertTrue($output);
        $this->assertCount(2, $this->obj->getAll());
    }

    public function test_WhenGetSubdomainByIdThenGetTheSpecificSubdomain()
    {
        $output = $this->obj->getById(2);

        $this->assertEquals('dpmptsp.gianyarkab.go.id', $output['sub_domain_link']);
        $this->assertEquals('Website resmi DPMPTSP', $output['sub_domain_deskripsi']);
    }

    public function test_WhenUpdateSubdomainThenSubdomainChanged()
    {
        $sub_domain_id = 2;
        $sub_domain = $this->obj->getById($sub_domain_id);
        $sub_domain['sub_domain_deskripsi'] = 'Website resmi DPMPTSP Gianyar';

        $_POST = [
            'sub_domain_link' => $sub_domain['sub_domain_link'],
            'sub_domain_deskripsi' => $sub_domain['sub_domain_deskripsi']
        ];

        $status = $this->obj->update($sub_domain_id);
        $output = $this->obj->getById($sub_domain_id);

        $this->assertTrue($status);
        $this->assertEquals('Website resmi DPMPTSP Gianyar', $output['sub_domain_deskripsi']);
    }

    public function test_WhenDeleteSubdomainThenGetOneSubdomain()
    {
        $sub_domain_id = 2;
        $output = $this->obj->delete($sub_domain_id);

        $this->assertTrue($output);
        $this->assertCount(1, $this->obj->getAll());
    }
}