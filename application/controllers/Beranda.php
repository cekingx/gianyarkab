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
		$this->load->model('pengumuman_model');
		$this->load->model('kegiatan_model');
		$this->load->model('carousel_model');
		$this->load->model('ucapan_perayaan_model');
		$this->load->library('form_validation');
	}

	public function index()
	{	$banner = $this->Banner_model;
		$kegiatan = $this->Kegiatan_model;
		$data['banner_besar'] = $banner->banner_besar_user();	
		$data['banner_kecil'] = $banner->banner_kecil_user();
		$data['kegiatan'] = $kegiatan->kegiatanHome();
		$data['pengumuman'] = $this->pengumuman_model->getLast(5);
		$data['kegiatan'] = $this->kegiatan_model->getLast();
		$data['carousels'] = $this->carousel_model->getAll();
		// return var_dump($data['banner_kecil']);
		// die;		
		$data['content'] = 'user-views/dashboard';		
		$this->load->view('user-views/layouts/master', $data);
	}

	//menu profile
	public function sejarah()
	{
		$data['content'] = 'user-views/profile/sejarah';		
		$this->load->view('user-views/layouts/master', $data);
	}	

	public function petakabupaten()
	{
		$data['content'] = 'user-views/profile/petakabupaten';		
		$this->load->view('user-views/layouts/master', $data);
	}

	public function artilambang()
	{
		$data['content'] = 'user-views/profile/artilambang';		
		$this->load->view('user-views/layouts/master', $data);
	}

	public function gianyardalamangka()
	{
		$data['content'] = 'user-views/profile/gianyardalamangka';		
		$this->load->view('user-views/layouts/master', $data);
	}

	//menu pemerintahan
	public function visimisi()
	{
		$data['content'] = 'user-views/pemerintahan/visidanmisi';		
		$this->load->view('user-views/layouts/master', $data);
	}

	public function tujuansasaran()
	{
		$data['content'] = 'user-views/pemerintahan/tujuandansasaran';		
		$this->load->view('user-views/layouts/master', $data);
	}

	public function struktur()
	{
		$data['content'] = 'user-views/pemerintahan/strukturorganisasi';		
		$this->load->view('user-views/layouts/master', $data);
	}

	//sub perangkat

	public function perangkat()
	{
		$data['content'] = 'user-views/pemerintahan/perangkat';		
		$this->load->view('user-views/layouts/master', $data);
	}

	//info gianyar

	public function telepon()
	{
		$data['content'] = 'user-views/infogianyar/teleponpenting';		
		$this->load->view('user-views/layouts/master', $data);
	}
	

	
}