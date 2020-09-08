<?php

class Kontak_test extends TestCase
{
    public function setUp()
    {
        $this->all_result = [
            [
                'kontak_person_id' => 1,
                'kontak_person_nama' => 'dirga',
                'kontak_person_alamat' => 'gianyar',
                'kontak_person_email' => 'dirga@example.com',
                'kontak_person_judul' => 'Laporan',
                'kontak_person_isi_aduan' => 'Aduan',
                'kontak_person_tanggal' => '2020-08-21'
            ],
            [
                'kontak_person_id' => 2,
                'kontak_person_nama' => 'nila',
                'kontak_person_alamat' => 'buleleng',
                'kontak_person_email' => 'nila@example.com',
                'kontak_person_judul' => 'Laporan',
                'kontak_person_isi_aduan' => 'Aduan',
                'kontak_person_tanggal' => '2020-08-21'
            ]
        ];
        $this->single_result = [
            'kontak_person_id' => 1,
            'kontak_person_nama' => 'dirga',
            'kontak_person_alamat' => 'gianyar',
            'kontak_person_email' => 'dirga@example.com',
            'kontak_person_judul' => 'Laporan',
            'kontak_person_isi_aduan' => 'Aduan',
            'kontak_person_tanggal' => '2020-08-21'
        ];

        $this->success_store_data = [
            'kontak_person_nama' => 'dirga',
            'kontak_person_alamat' => 'gianyar',
            'kontak_person_email' => 'dirga@example.com',
            'kontak_person_judul' => 'Laporan',
            'kontak_person_isi_aduan' => 'Aduan'
        ];

        $this->failed_store_data = [
            'kontak_person_nama' => 'dirga',
            'kontak_person_alamat' => 'gianyar',
            'kontak_person_email' => 'dirga@example.com',
            'kontak_person_judul' => 'Laporan',
        ];

        $this->kontak_person_id = $this->single_result['kontak_person_id'];
    }

    public function test_WhenAccessAllKontakThenGetAllKontak()
    {
        $all_result = $this->all_result;
        $this->request->setCallable(
            function ($ci) use ($all_result) {
                $kontak_model = $this->getDouble(
                    'Kontak_model', ['getAll' => $all_result]
                );
                $ci->kontak_model = $kontak_model;
            }
        );

        $output = $this->request('GET', '/admin/hubungi-kami');
        $this->assertContains('dirga', $output);
        $this->assertContains('nila', $output);
    }

    public function test_WhenAccessSpecificKontakThenGetSpecificKontak()
    {
        $single_result = $this->single_result;
        $this->request->setCallable(
            function ($ci) use ($single_result) {
                $kontak_model = $this->getDouble(
                    'Kontak_model', ['getById' => $single_result]
                );
                $ci->kontak_model = $kontak_model;
            }
        );

        $output = $this->request('GET', "/admin/hubungi-kami/" . $this->kontak_person_id);
        $this->assertContains('dirga', $output);
        $this->assertContains('dirga@example.com', $output);
    }

    public function test_WhenAccessNotExistedKontakThenGet404()
    {
        $this->request->setCallable(
            function ($ci) {
                $kontak_model = $this->getDouble(
                    'Kontak_model', ['getById' => null]
                );
                $ci->kontak_model = $kontak_model;
            }
        );

        $output = $this->request('GET', "/admin/hubungi-kami" . $this->kontak_person_id);
        $this->assertResponseCode(404);
    }

    public function test_WhenSuccessAddKontakThenRedirectedToCreate()
    {
        $this->request->setCallable(
            function ($ci) {
                $kontak_model = $this->getDouble(
                    'Kontak_model', ['save' => true]
                );
                $ci->kontak_model = $kontak_model;
            }
        );

        $output = $this->request(
            'POST',
            '/hubungi-kami/store',
            $this->success_store_data
        );
        $this->assertRedirect('/hubungi-kami', 302);
    }

    public function test_WhenFailedAddKontakThenRedirectedToCreate()
    {
        $this->request->setCallable(
            function ($ci) {
                $kontak_model = $this->getDouble(
                    'Kontak_model', ['save' => true]
                );
                $ci->kontak_model = $kontak_model;
            }
        );

        $output = $this->request(
            'POST',
            '/hubungi-kami/store',
            $this->failed_store_data
        );
        $this->assertRedirect('/hubungi-kami', 302);
    }

    public function test_WhenSuccessDeleteKontakThenRedirectedToIndex()
    {
        $this->request->setCallable(
            function ($ci) {
                $kontak_model = $this->getDouble(
                    'Kontak_model', ['delete' => true, 'getById' => $this->single_result]
                );
                $ci->kontak_model = $kontak_model;
            }
        );

        $kontak_person_id = $this->kontak_person_id;
        $output = $this->request('GET', "/admin/hubungi-kami/delete/$kontak_person_id");
        $this->assertRedirect('/admin/hubungi-kami', 302);
    }

    public function test_WhenDeleteNotExistedKontakThenGet404()
    {
        $this->request->setCallable(
            function ($ci) {
                $kontak_model = $this->getDouble(
                    'Kontak_model', ['getById' => null]
                );
                $ci->kontak_model = $kontak_model;
            }
        );

        $kontak_person_id = $this->kontak_person_id;
        $output = $this->request('GET', "/admin/hubungi-kami/delete/$kontak_person_id");
        $this->assertResponseCode(404);
    }
}