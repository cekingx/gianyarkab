<?php

/**
 * @group controller
 */
class Alamat_instansi_test extends TestCase
{
    public function setUp()
    {
        $this->all_result = [
            [
                'alamat_instansi_id' => 1,
                'alamat_instansi_nama' => 'Diskominfo',
                'alamat_instansi_alamat' => 'Jln. Kebo Iwa',
                'alamat_instansi_telp' => '08123456789',
                'alamat_instansi_email' => 'diskominfo@gianyarkab.go.id'
            ],
            [
                'alamat_instansi_id' => 2,
                'alamat_instansi_nama' => 'DPMPTSP',
                'alamat_instansi_alamat' => 'Jln. Ngurah Rai',
                'alamat_instansi_telp' => '08123456789',
                'alamat_instansi_email' => 'dpmptsp@gianyarkab.go.id'
            ]
        ];

        $this->single_result = [
            'alamat_instansi_id' => 1,
            'alamat_instansi_nama' => 'Diskominfo',
            'alamat_instansi_alamat' => 'Jln. Kebo Iwa',
            'alamat_instansi_telp' => '08123456789',
            'alamat_instansi_email' => 'diskominfo@gianyarkab.go.id'
        ];

        $this->success_store_data = [
            'alamat_instansi_nama' => 'Diskominfo',
            'alamat_instansi_alamat' => 'Jln. Kebo Iwa',
            'alamat_instansi_telp' => '08123456789',
            'alamat_instansi_email' => 'diskominfo@gianyarkab.go.id'
        ];

        $this->failed_store_data = [
            'alamat_instansi_nama' => 'Diskominfo',
            'alamat_instansi_alamat' => 'Jln. Kebo Iwa',
            'alamat_instansi_email' => 'diskominfo@gianyarkab.go.id'
        ];

        $this->success_update_data = [
            'alamat_instansi_id' => 1,
            'alamat_instansi_nama' => 'Diskominfo',
            'alamat_instansi_alamat' => 'Jln. Kebo Iwa',
            'alamat_instansi_telp' => '08123456789',
            'alamat_instansi_email' => 'diskominfo@gianyarkab.go.id'
        ];

        $this->failed_update_data = [
            'alamat_instansi_id' => 1,
            'alamat_instansi_nama' => 'Diskominfo',
            'alamat_instansi_telp' => '08123456789',
            'alamat_instansi_email' => 'diskominfo@gianyarkab.go.id'
        ];

        $this->alamat_instansi_id = $this->single_result['alamat_instansi_id'];
    }

    public function test_WhenAccessAllAlamatInstansiThenGetAllAlamatInstansi()
    {
        $all_result = $this->all_result;
        $this->request->setCallable(
            function ($ci) use ($all_result) {
                $alamat_instansi_model = $this->getDouble(
                    'Alamat_instansi_model', ['getAll' => $all_result]
                );
                $ci->alamat_instansi_model = $alamat_instansi_model;
            }
        );

        $output = $this->request('GET', '/admin/alamat-instansi');
        $this->assertContains('Diskominfo', $output);
        $this->assertContains('DPMPTSP', $output);
    }

    public function test_WhenAccessSpecificAlamatInstansiThenGetTheAlamatInstansi()
    {
        $single_result = $this->single_result;
        $this->request->setCallable(
            function ($ci) use ($single_result) {
                $alamat_instansi_model = $this->getDouble(
                    'Alamat_instansi_model', ['getById' => $single_result]
                );
                $ci->alamat_instansi_model = $alamat_instansi_model;
            }
        );

        $output = $this->request('GET', "/admin/alamat-instansi/" . $this->alamat_instansi_id);
        $this->assertContains('Diskominfo', $output);
        $this->assertContains('Jln. Kebo Iwa', $output);
    }

    public function test_WhenAccessNotExistedAlamatInstansiThenGet404()
    {
        $this->request->setCallable(
            function ($ci) {
                $alamat_instansi_model = $this->getDouble(
                    'Alamat_instansi_model', ['getById' => null]
                );
                $ci->alamat_instansi_model = $alamat_instansi_model;
            }
        );

        $output = $this->request('GET', "/admin/alamat-instansi" . $this->alamat_instansi_id);
        $this->assertResponseCode(404);
    }
    
    public function test_WhenSuccessAddAlamatInstansiThenRedirectedToIndex()
    {
        $this->request->setCallable(
            function ($ci) {
                $alamat_instansi_model = $this->getDouble(
                    'Alamat_instansi_model', ['save' => true]
                );
                $ci->alamat_instansi_model = $alamat_instansi_model;
            }
        );

        $output = $this->request(
            'POST',
            '/admin/alamat-instansi/store',
            $this->success_store_data
        );
        $this->assertRedirect('/admin/alamat-instansi', 302);
    }

    public function test_WhenFailedAddAlamatInstansiThenRedirectedToCreate()
    {
        $this->request->setCallable(
            function ($ci) {
                $alamat_instansi_model = $this->getDouble(
                    'Alamat_instansi_model', ['save' => true]
                );
                $ci->alamat_instansi_model = $alamat_instansi_model;
            }
        );

        $output = $this->request(
            'POST',
            '/admin/alamat-instansi/store',
        );
        $this->assertRedirect('/admin/alamat-instansi/create', 302);
    }

    public function test_WhenSuccessUpdateAlamatInstansiThenRedirectedToIndex()
    {
        $this->request->setCallable(
            function ($ci) {
                $alamat_instansi_model = $this->getDouble(
                    'Alamat_instansi_model', ['update' => true]
                );
                $ci->alamat_instansi_model = $alamat_instansi_model;
            }
        );

        $output = $this->request(
            'POST',
            '/admin/alamat-instansi/update',
            $this->success_update_data
        );
        $this->assertRedirect('/admin/alamat-instansi', 302);
    }

    public function test_WhenFailedUpdateAlamatInstansiThenRedirectedToEdit()
    {
        $this->request->setCallable(
            function ($ci) {
                $alamat_instansi_model = $this->getDouble(
                    'Alamat_instansi_model', ['update' => true]
                );
                $ci->alamat_instansi_model = $alamat_instansi_model;
            }
        );

        $output = $this->request(
            'POST',
            '/admin/alamat-instansi/update',
            $this->failed_update_data
        );

        $alamat_instansi_id = $this->alamat_instansi_id;
        $this->assertRedirect("/admin/alamat-instansi/edit/$alamat_instansi_id", 302);
    }

    public function test_WhenUpdateNotExistedAlamatInstansiThenGet404()
    {
        $this->request->setCallable(
            function ($ci) {
                $alamat_instansi_model = $this->getDouble(
                    'Alamat_instansi_model', ['getById' => null]
                );
                $ci->alamat_instansi_model = $alamat_instansi_model;
            }
        );

        $alamat_instansi_id = $this->alamat_instansi_id;
        $output = $this->request('GET', "/admin/alamat-instansi/edit/$alamat_instansi_id");
        $this->assertResponseCode(404);
    }

    public function test_WhenSuccessDeleteAlamatInstansiThenRedirectedToIndex()
    {
        $this->request->setCallable(
            function ($ci) {
                $alamat_instansi_model = $this->getDouble(
                    'Alamat_instansi_model', ['delete' => true, 'getById' => $this->single_result]
                );
                $ci->alamat_instansi_model = $alamat_instansi_model;
            }
        );

        $alamat_instansi_id = $this->alamat_instansi_id;
        $output = $this->request('GET', "/admin/alamat-instansi/delete/$alamat_instansi_id");
        $this->assertRedirect('/admin/alamat-instansi', 302);
    }

    public function test_WhenDeleteNotExistedAlamatInstansiThenGet404()
    {
        $this->request->setCallable(
            function ($ci) {
                $alamat_instansi_model = $this->getDouble(
                    'Alamat_instansi_model', ['getById' => null]
                );
                $ci->alamat_instansi_model = $alamat_instansi_model;
            }
        );

        $alamat_instansi_id = $this->alamat_instansi_id;
        $output = $this->request('GET', "/admin/alamat-instansi/delete/$alamat_instansi_id");
        $this->assertResponseCode(404);
    }
}