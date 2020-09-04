<?php

/**
 * @group controller
 */

class Subdomain_test extends TestCase
{
    public function setUp()
    {
        $this->all_result = [
            [
                'sub_domain_id' => 1,
                'sub_domain_link' => 'dpmptsp.gianyarkab.go.id',
                'sub_domain_deskripsi' => 'Website resmi dpmptsp'
            ],
            [
                'sub_domain_id' => 2,
                'sub_domain_link' => 'dukcapil.gianyarkab.go.id',
                'sub_domain_deskripsi' => 'Website resmi disdukcapil'
            ]
        ];

        $this->single_result = [
            'sub_domain_id' => 1,
            'sub_domain_link' => 'dpmptsp.gianyarkab.go.id',
            'sub_domain_deskripsi' => 'Website resmi dpmptsp'
        ];

        $this->success_store_data = [
            'sub_domain_link' => 'dpmptsp.gianyarkab.go.id',
            'sub_domain_deskripsi' => 'Website resmi dpmptsp'
        ];

        $this->failed_store_data = [
            'sub_domain_link' => 'dpmptsp.gianyarkab.go.id',
        ];

        $this->success_update_data = [
            'sub_domain_id' => 1,
            'sub_domain_link' => 'dpmptsp.gianyarkab.go.id',
            'sub_domain_deskripsi' => 'Website resmi dpmptsp'
        ];

        $this->failed_update_data = [
            'sub_domain_id' => 1,
            'sub_domain_link' => 'dpmptsp.gianyarkab.go.id',
        ];

        $this->sub_domain_id = $this->single_result['sub_domain_id'];
    }

    public function test_WhenAccessAllSubdomainThenGetAllSubdomain()
    {
        $all_result = $this->all_result;
        $this->request->setCallable(
            function ($ci) use ($all_result) {
                $subdomain_model = $this->getDouble(
                    'Subdomain_model', ['getAll' => $all_result]
                );
                $ci->subdomain_model = $subdomain_model;
            }
        );

        $output = $this->request('GET', '/admin/subdomain');
        $this->assertContains('dpmptsp.gianyarkab.go.id', $output);
        $this->assertContains('dukcapil.gianyarkab.go.id', $output);
    }

    public function test_WhenSuccessAddSubdomainThenRedirectedToIndex()
    {
        $this->request->setCallable(
            function ($ci) {
                $subdomain_model = $this->getDouble(
                    'Subdomain_model', ['save' => true]
                );
                $ci->subdomain_model = $subdomain_model;
            }
        );

        $output = $this->request(
            'POST',
            '/admin/subdomain/store',
            $this->success_store_data
        );
        $this->assertRedirect('/admin/subdomain', 302);
    }

    public function test_WhenFailedAddSubdomainThenRedirectedToCreate()
    {
        $this->request->setCallable(
            function ($ci) {
                $subdomain_model = $this->getDouble(
                    'Subdomain_model', ['save' => true]
                );
                $ci->subdomain_model = $subdomain_model;
            }
        );

        $output = $this->request(
            'POST',
            '/admin/subdomain/store',
        );
        $this->assertRedirect('/admin/subdomain/create', 302);
    }

    public function test_WhenSuccessUpdateSubdomainThenRedirectedToIndex()
    {
        $this->request->setCallable(
            function ($ci) {
                $subdomain_model = $this->getDouble(
                    'Subdomain_model', ['update' => true]
                );
                $ci->subdomain_model = $subdomain_model;
            }
        );

        $output = $this->request(
            'POST',
            '/admin/subdomain/update',
            $this->success_update_data
        );
        $this->assertRedirect('/admin/subdomain', 302);
    }

    public function test_WhenFailedUpdateSubdomianThenRedirectedToEdit()
    {
        $this->request->setCallable(
            function ($ci) {
                $subdomain_model = $this->getDouble(
                    'Subdomain_model', ['update' => true]
                );
                $ci->subdomain_model = $subdomain_model;
            }
        );

        $output = $this->request(
            'POST',
            '/admin/subdomain/update',
            $this->failed_update_data
        );

        $sub_domain_id = $this->sub_domain_id;
        $this->assertRedirect("/admin/subdomain/edit/$sub_domain_id", 302);
    }

    public function test_WhenUpdateNotExistedSubdomainThenGet404()
    {
        $this->request->setCallable(
            function ($ci) {
                $subdomain_model = $this->getDouble(
                    'Subdomain_model', ['getById' => null]
                );
                $ci->subdomain_model = $subdomain_model;
            }
        );

        $sub_domain_id = $this->sub_domain_id;
        $output = $this->request('GET', "/admin/subdomain/edit/$sub_domain_id");
        $this->assertResponseCode(404);
    }

    public function test_WhenSuccessDeleteSubdomainThenRedirectedToIndex()
    {
        $this->request->setCallable(
            function ($ci) {
                $subdomain_model = $this->getDouble(
                    'Subdomain_model', ['delete' => true, 'getById' => $this->single_result]
                );
                $ci->subdomain_model = $subdomain_model;
            }
        );

        $sub_domain_id = $this->sub_domain_id;
        $output = $this->request('GET', "/admin/subdomain/delete/$sub_domain_id");
        $this->assertRedirect('/admin/subdomain', 302);
    }

    public function test_WhenDeleteNotExistedSubdomainThenGet404()
    {
        $this->request->setCallable(
            function ($ci) {
                $subdomain_model = $this->getDouble(
                    'Subdomain_model', ['getById' => null]
                );
                $ci->subdomain_model = $subdomain_model;
            }
        );

        $sub_domain_id = $this->sub_domain_id;
        $output = $this->request('GET', "/admin/subdomain/delete/$sub_domain_id");
        $this->assertResponseCode(404);
    }
}