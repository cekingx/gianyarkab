<?php defined('BASEPATH') OR exit('No direct script access allowed');

class media_cetak extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("Jenis_laporan_model");		
		$this->load->model("Media_cetak_model");
		$this->load->model('kritik_saran_model');		
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['content'] = 'admin/media_cetak/index';		
		$this->load->view('admin/index', $data);
	}

	//index data media
	public function media_cetak_data()
	{
		$data = $this->Media_cetak_model->getAll();
		echo json_encode($data);
	}

	public function show($id)
	{
		$data['media_cetak'] = $this->Media_cetak_model->getById($id);		
        if (empty($data['media_cetak'])) {
            show_404();
        }
        $data['content'] = 'admin/media_cetak/show';
        $data['title'] = $data['media_cetak']->media_cetak_nama;
        // echo json_encode($data);
        $this->load->view('admin/index', $data);
	}

	public function create()
	{
		$data['content'] = 'admin/media_cetak/create';		
		$this->load->view('admin/index', $data);
	}

	public function store()
	{
		$media_cetak = $this->Media_cetak_model;		
		$validation = $this->form_validation;
		$validation->set_rules($media_cetak->rules());		 	

		if ($validation->run() != false) {			
			$media_cetak->save();						
			
			echo json_encode($media_cetak);
		}
		
	}

	public function edit($id)
	{
		if (!isset($id)) redirect('media_cetak');
		$media_cetak = $this->Media_cetak_model;

		$data['content'] = 'admin/media_cetak/edit';
		$data["media_cetak"] = $media_cetak->getById($id);		
		if(!$data["media_cetak"]) show_404();

		$this->load->view("admin/index", $data);
	}

	public function update()
	{
		$media_cetak = $this->Media_cetak_model;		
		$validation = $this->form_validation;
		$validation->set_rules($media_cetak->rules());

		if ($validation->run()) {
			$media_cetak->update();
			
			echo json_encode($media_cetak);
		}	
	}

	public function delete($id = null)
	{
		if (!isset($id)) show_404();

		$this->Media_cetak_model->delete($id);
		$this->session->set_flashdata('hapus', 'Data Berhasil di Hapus');	

		echo json_encode($this);		
	}

	public function index_user()
	{
		$data['media_cetak'] = $this->Media_cetak_model->getAll();

		$data['content'] = 'user-views/infogianyar/koranpaswara';		
		$this->load->view('user-views/layouts/master', $data);
	}
	
}