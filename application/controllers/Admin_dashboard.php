<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('galeri_model');
        $this->load->model('kritik_saran_model');
        $this->load->model('carousel_model');
        $this->load->model('ucapan_perayaan_model');
        $this->load->model('pengumuman_model');
        $this->load->model('banner_model');
        $this->load->model('kegiatan_model');
        $this->load->model('jabatanbupati_model');
        $this->load->model('alamat_instansi_model');
        $this->load->model('laporan_model');
        $this->load->model('subdomain_model');
        $this->load->model('artikel_berita_model');
        $this->load->model('media_cetak_model');
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
        $galeri_count           = $this->galeri_model->getNumRows();
        $kritik_saran_count     = $this->kritik_saran_model->getNumRows();
        $carousel_count         = $this->carousel_model->getNumRows();
        $ucapan_perayaan_count  = $this->ucapan_perayaan_model->getNumRows();
        $pengumuman_count       = $this->pengumuman_model->getNumRows();
        $banner_count           = $this->banner_model->getNumRows();
        $kegiatan_count         = $this->kegiatan_model->getNumRows();
        $jabatanbupati_count    = $this->jabatanbupati_model->getNumRows();
        $alamat_instansi_count  = $this->alamat_instansi_model->getNumRows();
        $laporan_count          = $this->laporan_model->getNumRows();
        $subdomain_count        = $this->subdomain_model->getNumRows();
        $artikel_berita_count   = $this->artikel_berita_model->getNumRows();
        $media_cetak_count      = $this->media_cetak_model->getNumRows();
        $kontak_count           = $this->kontak_model->getNumRows();

        return [
            [
                'count' => $galeri_count,
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
                'count' => $carousel_count,
                'content' => 'Carousel',
                'icon' => 'image',
                'link' => base_url('admin/carousel')
            ],
            [
                'count' => $ucapan_perayaan_count,
                'content' => 'Ucapan Perayaan',
                'icon' => 'quote',
                'link' => base_url('admin/ucapan-perayaan')
            ],
            [
                'count' => $pengumuman_count,
                'content' => 'Pengumuman',
                'icon' => 'broadcast',
                'link' => base_url('admin/pengumuman')

            ],
            [
                'count' => $banner_count,
                'content' => 'Banner',
                'icon' => 'picture',
                'link' => base_url('admin/banner')
            ],
            [
                'count' => $kegiatan_count,
                'content' => 'Kegiatan',
                'icon' => 'thumbtack',
                'link' => base_url('admin/kegiatan')
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
                'count' => $laporan_count,
                'content' => 'Laporan',
                'icon' => 'clipboard',
                'link' => base_url('admin/laporan')
            ],
            [
                'count' => $subdomain_count,
                'content' => 'Sub Domain',
                'icon' => 'website',
                'link' => base_url('admin/subdomain')
            ],
            [
                'count' => $artikel_berita_count,
                'content' => 'Artikel Berita',
                'icon' => 'font',
                'link' => base_url('admin/artikel_berita')
            ],
            [
                'count' => $media_cetak_count,
                'content' => 'Media Cetak',
                'icon' => 'file',
                'link' => base_url('admin/media_cetak')
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