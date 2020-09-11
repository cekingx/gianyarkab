<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('kritik_saran_model');
        $this->load->model('pengumuman_model');
        $this->load->model('jabatanbupati_model');
        $this->load->model('alamat_instansi_model');
        $this->load->model('subdomain_model');
        $this->load->model('kontak_model');
    }

    public function index()
    {
        $data['widgets'] = $this->getDashboardData();
        $data['content'] = 'admin/admin_dashboard/index';

        $this->load->view('admin/index', $data);
    }

    private function getDashboardData()
    {
        $kritik_saran_count = $this->kritik_saran_model->getNumRows();
        $pengumuman_count = $this->pengumuman_model->getNumRows();
        $jabatanbupati_count = $this->jabatanbupati_model->getNumRows();
        $alamat_instansi_count = $this->alamat_instansi_model->getNumRows();
        $subdomain_count = $this->subdomain_model->getNumRows();
        $kontak_count = $this->kontak_model->getNumRows();

        return [
            [
                'count' => 2,
                'content' => 'Galeri',
                'icon' => 'picture',
                'link' => base_url('admin/galeri')
            ],
            [
                'count' => $kritik_saran_count,
                'content' => 'Kritik Saran',
                'icon' => 'people',
                'link' => base_url('admin/kritik-saran')

            ],
            [
                'count' => $pengumuman_count,
                'content' => 'Pengumuman',
                'icon' => 'broadcast',
                'link' => base_url('admin/pengumuman')

            ],
            [
                'count' => $jabatanbupati_count,
                'content' => 'Bupati',
                'icon' => 'person',
                'link' => base_url('admin/jabatan-bupati')
            ],
            [
                'count' => $alamat_instansi_count,
                'content' => 'Alamat Instansi',
                'icon' => 'location',
                'link' => base_url('admin/alamat-instansi')
            ],
            [
                'count' => $subdomain_count,
                'content' => 'Sub Domain',
                'icon' => 'website',
                'link' => base_url('admin/subdomain')
            ],
            [
                'count' => $kontak_count,
                'content' => 'Kontak dan Pesan',
                'icon' => 'people',
                'link' => base_url('admin/kontak')
            ]
        ];
    }
}