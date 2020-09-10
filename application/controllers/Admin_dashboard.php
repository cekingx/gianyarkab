<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['widgets'] = $this->getDashboardData();
        $data['content'] = 'admin/admin_dashboard/index';

        $this->load->view('admin/index', $data);
    }

    private function getDashboardData()
    {
        return [
            [
                'count' => 2,
                'content' => 'Galeri',
                'icon' => 'orang',
                'link' => base_url('admin/galeri')
            ],
            [
                'count' => 3,
                'content' => 'Kritik Saran',
                'icon' => 'orang',
                'link' => base_url('admin/kritik-saran')

            ],
            [
                'count' => 4,
                'content' => 'Pengumuman',
                'icon' => 'orang',
                'link' => base_url('admin/pengumuman')

            ],
            [
                'count' => 9,
                'content' => 'Subdomain',
                'icon' => 'sinyal',
                'link' => base_url('admin/subdomain')
            ],
        ];
    }
}