<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("Jenis_laporan_model");
		$this->load->model("Banner_model");		
		$this->load->model("Kegiatan_model");
		$this->load->model('kritik_saran_model');
		$this->load->library('form_validation');
	}

	public function index()
	{	$banner = $this->Banner_model;
		$kegiatan = $this->Kegiatan_model;
		$data['banner_besar'] = $banner->banner_besar_user();	
		$data['banner_kecil'] = $banner->banner_kecil_user();
		$data['kegiatan'] = $kegiatan->kegiatanHome();
		// return var_dump($data['banner_kecil']);
		// die;		
		$data['content'] = 'user-views/dashboard';		
		$this->load->view('user-views/layouts/master', $data);
	}	
	
}