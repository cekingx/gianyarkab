<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();		
		$this->load->model("Jenis_laporan_model");
		$this->load->model("Laporan_model");		
		$this->load->library('form_validation');
	}

	public function index()
	{
		if(!empty($this->session->flashdata('message'))) {
            $data['message'] = $this->session->flashdata('message');
        }

		$data['content'] = 'admin/laporan/index';		
		$this->load->view('admin/index', $data);
	}

	public function index_user($id)
	{
		$data['laporan'] = $this->Laporan_model->getLaporan($id);
		$data['title'] = $this->Jenis_laporan_model->getById($id);		

		$data['content'] = 'user-views/pemerintahan/laporan';		
		$this->load->view('user-views/layouts/master', $data);
	}

	public function laporan_data()
	{
		$data = $this->Laporan_model->getAll();
		echo json_encode($data);
	}

	public function show($id)
	{
		$data['laporan'] = $this->Laporan_model->getById($id);		
        if (empty($data['laporan'])) {
            show_404();
        }
        $data['content'] = 'admin/laporan/show';
        $data['title'] = $data['laporan']->laporan_nama;        
        $this->load->view('admin/index', $data);
	}

	public function create()
	{
		$data['content'] = 'admin/laporan/create';
		$data["jenis_laporan"] = $this->Jenis_laporan_model->getAll();		
		$this->load->view('admin/index', $data);
	}

	public function store()
	{
		$laporan = $this->Laporan_model;		
		$validation = $this->form_validation;
		$validation->set_rules($laporan->rules());		 	

		if ($validation->run() != false) {			
			$laporan->save();						
			
			echo json_encode($laporan);
		}		
	}

	public function edit($id)
	{
		if (!isset($id)) redirect('laporan');		

		$laporan = $this->Laporan_model;
		$data['content'] = 'admin/laporan/edit';
		$data["laporan"] = $laporan->getById($id);
		$data["jenis_laporan"] = $this->Jenis_laporan_model->getAll();				
		if(!$data["laporan"]) show_404();

		$this->load->view("admin/index", $data);
	}

	public function update()
	{
		$laporan = $this->Laporan_model;		
		$validation = $this->form_validation;
		$validation->set_rules($laporan->rules());

		if ($validation->run()) {
			$laporan->update();
			
			echo json_encode($laporan);
		}	
	}

	public function delete($id = null)
	{
		if (!isset($id)) show_404();

		$this->Laporan_model->delete($id);
		
		echo json_encode($this);
		
	}

	public function index_jenis()
	{		
		$data['content'] = 'admin/laporan/show_jenis';		
		$this->load->view('admin/index', $data);
	}

	public function jenis_data()
	{
		$data = $this->Jenis_laporan_model->getAll();
		echo json_encode($data);
	}	

	public function store_jenis()
	{
		$jenis_laporan = $this->Jenis_laporan_model;		
		$validation = $this->form_validation;
		$validation->set_rules($jenis_laporan->rules());		

		if ($validation->run()) {
			$jenis_laporan->save();			
			
			echo json_encode($jenis_laporan);
		}		
	}

	public function edit_jenis($id)
	{
		if (!isset($id)) redirect('admin/laporan');

		$laporan = $this->Jenis_laporan_model;
		
		$data['content'] = 'admin/laporan/edit_jenis';
		$data["jenis_laporan"] = $laporan->getById($id);		
		if(!$data["jenis_laporan"]) show_404();

		$this->load->view("admin/index", $data);
	}

	public function update_jenis()
	{
		$laporan = $this->Jenis_laporan_model;		
		$validation = $this->form_validation;
		$validation->set_rules($laporan->rules());

		if ($validation->run() != false) {
			$laporan->update();
			
			echo json_encode($laporan);
		}	
	}

	public function delete_jenis($id = null)
	{
		if (!isset($id)) show_404();

		$this->Jenis_laporan_model->delete($id);
		$this->session->set_flashdata('hapus', 'Data Berhasil di Hapus');				
		
		echo json_encode($this);
	}

	
	
}