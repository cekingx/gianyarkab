<?php

/**
 * @group controller
 */

class JabatanBupati_test extends TestCase
{
    public function test_WhenAccessAllJabatanBupatiThenGetAllJabatanBupati()
    {
        $result_array = [
            [
                'jabatan_bupati_id' => 1,
                'jabatan_bupati_nama' => 'Dirga',
                'jabatan_bupati_foto' => 'default.jpg',
                'jabatan_bupati_masa_jabatan' => '2000-2002',
                'jabatan_bupati_tanggal' => '2020-07-23'
            ],
            [
                'jabatan_bupati_id' => 2,
                'jabatan_bupati_nama' => 'Nila',
                'jabatan_bupati_foto' => 'default.jpg',
                'jabatan_bupati_masa_jabatan' => '2000-2002',
                'jabatan_bupati_tanggal' => '2020-07-23'
            ]
        ];

        $this->request->setCallable(
            function ($ci) use ($result_array) {
                $jabatanbupati_model = $this->getDouble(
                    'Jabatanbupati_model', ['getAll' => $result_array]
                );
                $ci->jabatanbupati_model = $jabatanbupati_model;
            }
        );

        $output = $this->request('GET', '/admin/jabatan-bupati');
        $this->assertContains('Dirga', $output);
        $this->assertContains('Nila', $output);
    }

    public function test_WhenAccessSpecificJabatanBupatiThenGetSpecificJabatanBupati()
    {
        $jabatan_bupati_id = 1;
        $result = [
            'jabatan_bupati_id' => 1,
            'jabatan_bupati_nama' => 'Nila',
            'jabatan_bupati_foto' => 'default.jpg',
            'jabatan_bupati_masa_jabatan' => '2000-2002',
            'jabatan_bupati_tanggal' => '2020-07-23'
        ];

        $this->request->setCallable(
            function ($ci) use ($result) {
                $jabatanbupati_model = $this->getDouble(
                    'Jabatanbupati_model', ['getById' => $result]
                );
                $ci->jabatanbupati_model = $jabatanbupati_model;
            }
        );

        $output = $this->request('GET', "/admin/jabatan-bupati/$jabatan_bupati_id");
        $this->assertContains('Nila', $output);
        $this->assertContains('2000-2002', $output);
    }

    public function test_WhenAccessNotExistedJabatanBupatiThenGet404()
    {
        $jabatan_bupati_id = 1;

        $this->request->setCallable(
            function ($ci) {
                $jabatanbupati_model = $this->getDouble(
                    'Jabatanbupati_model', ['getById' => null]
                );
                $ci->jabatanbupati_model = $jabatanbupati_model;
            }
        );

        $output = $this->request('GET', "/admin/jabatan-bupati/$jabatan_bupati_id");
        $this->assertResponseCode(404);
    }

    public function test_WhenSuccessAddJabatanBupatiThenRedirectedToIndex()
    {
        $this->request->setCallable(
            function ($ci) {
                $jabatanbupati_model = $this->getDouble(
                    'Jabatanbupati_model', ['save' => true]
                );
                $ci->jabatanbupati_model = $jabatanbupati_model;
            }
        );

        $output = $this->request(
            'POST',
            '/admin/jabatan-bupati/store',
            [
                'jabatan_bupati_nama' => 'Dirga',
                'jabatan_bupati_masa_jabatan' => '2000-2002'
            ]
        );

        $this->assertRedirect('/admin/jabatan-bupati', 302);
    }

    public function test_WhenFailedAddJabatanBupatiThenRedirectedToCreate()
    {
        $this->request->setCallable(
            function ($ci) {
                $jabatanbupati_model = $this->getDouble(
                    'Jabatanbupati_model', ['save' => true]
                );
                $ci->jabatanbupati_model = $jabatanbupati_model;
            }
        );

        $output = $this->request(
            'POST',
            '/admin/jabatan-bupati/store',
            [
                'jabatan_bupati_nama' => 'Dirga',
            ]
        );

        $this->assertRedirect('/admin/jabatan-bupati/create', 302);
    }

    public function test_WhenSuccessUpdateJabatanBupatiThenRedirectedToIndex()
    {
        $this->request->setCallable(
            function ($ci) {
                $jabatanbupati_model = $this->getDouble(
                    'Jabatanbupati_model', ['update' => true]
                );
                $ci->jabatanbupati_model = $jabatanbupati_model;
            }
        );

        $output = $this->request(
            'POST',
            '/admin/jabatan-bupati/update/',
            [
                'jabatan_bupati_id' => 1,
                'jabatan_bupati_nama' => 'Dirga',
                'jabatan_bupati_masa_jabatan' => '2000-2002'
            ]
        );

        $this->assertRedirect('/admin/jabatan-bupati', 302);
    }

    public function test_WhenFailedUpdateJabatanBupatiThenRedirectedToEdit()
    {
        $this->request->setCallable(
            function ($ci) {
                $jabatanbupati_model = $this->getDouble(
                    'Jabatanbupati_model', ['update' => true]
                );
                $ci->jabatanbupati_model = $jabatanbupati_model;
            }
        );

        $jabatan_bupati_id = 1;
        $output = $this->request(
            'POST',
            '/admin/jabatan-bupati/update/',
            [
                'jabatan_bupati_id' => $jabatan_bupati_id,
                'jabatan_bupati_nama' => 'Dirga',
            ]
        );

        $this->assertRedirect("/admin/jabatan-bupati/edit/$jabatan_bupati_id", 302);
    }

    public function test_WhenUpdateNotExistedJabatanBupatiThenGet404()
    {
        $this->request->setCallable(
            function ($ci) {
                $jabatanbupati_model = $this->getDouble(
                    'Jabatanbupati_model', ['getById' => null]
                );
                $ci->jabatanbupati_model = $jabatanbupati_model;
            }
        );

        $jabatan_bupati_id = 1;
        $output = $this->request('GET', "/admin/jabatan-bupati/edit/$jabatan_bupati_id");

        $this->assertResponseCode(404);
    }

    public function test_WhenSuccessDeleteJabatanBupatiThenRedirectedToIndex()
    {
        $result = [
            'jabatan_bupati_id' => 1,
            'jabatan_bupati_nama' => 'Dirga',
            'jabatan_bupati_foto' => 'default.jpg',
            'jabatan_bupati_masa_jabatan' => '2000-2002',
            'jabatan_bupati_tanggal' => '2020-07-23'
        ];

        $this->request->setCallable(
            function ($ci) use ($result) {
                $jabatanbupati_model = $this->getDouble(
                    'Jabatanbupati_model', ['delete' => true, 'getById' => $result]
                );
                $ci->jabatanbupati_model = $jabatanbupati_model;
            }
        );

        $jabatan_bupati_id = $result['jabatan_bupati_id'];
        $output = $this->request('GET', "/admin/jabatan-bupati/delete/$jabatan_bupati_id");

        $this->assertRedirect("/admin/jabatan-bupati", 302);
    }

    public function test_WhenDeleteNotExistedJabatanBupatiThenGet404()
    {
        $this->request->setCallable(
            function ($ci) {
                $jabatanbupati_model = $this->getDouble(
                    'Jabatanbupati_model', ['getById' => null]
                );
                $ci->jabatanbupati_model = $jabatanbupati_model;
            }
        );

        $jabatan_bupati_id = 1;
        $output = $this->request('GET', "/admin/jabatan-bupati/delete/$jabatan_bupati_id");

        $this->assertResponseCode(404);
    }
}