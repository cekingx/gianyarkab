<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Banner extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
				
		$this->load->model("Banner_model");		
		$this->load->library('form_validation');
	}

	public function index()
	{
		if(!empty($this->session->flashdata('message'))) {
            $data['message'] = $this->session->flashdata('message');
        }

        $data['content'] = 'admin/banner/index';
		$this->load->view('admin/index', $data);

		// $data['content'] = 'banner/show';
		// $data["banner"] = $this->Banner_model->getAll();
		// $this->load->view('layouts/master', $data);
	}	

	public function show($id)
	{
		$data['banner'] = $this->Banner_model->getById($id);
        if (empty($data['banner'])) {
            show_404();
        }
        $data['content'] = 'admin/banner/show';
        $data['title'] = $data['banner']->banner_judul;
        $this->load->view('admin/index', $data);
	}

	public function banner_data()
	{
		$data = $this->Banner_model->getAll();
		echo json_encode($data);
	}

	public function create()
	{
		$data['content'] = 'admin/banner/create';				
		$this->load->view('admin/index', $data);
	}

	public function store()
	{
		$banner = $this->Banner_model;		
		$validation = $this->form_validation;
		$validation->set_rules($banner->rules());		
		$validation->set_message('required','{field} tidak boleh kosong');		 	

		if ($validation->run() == false) {			
			$data = [
				'judul' => form_error('judul')											
			];
			echo json_encode($data);
			// $this->session->set_flashdata('gagal', json_encode($data));	
			// redirect('/admin/banner/create');
			// echo json_encode($data);
		}
		else {
			$banner->save();						
			echo json_encode($banner);
			// $this->session->set_flashdata('success', 'Data Berhasil disimpan');	
			// $data['content'] = 'banner/create';		
			// $this->load->view('layouts/master', $data);
		}
				
	}

	public function edit($id)
	{
		if (!isset($id)) redirect('banner');

		$banner = $this->Banner_model;
		$data["banner"] = $banner->getById($id);
		$data['content'] = 'admin/banner/edit';
				
		if(!$data["banner"]) show_404();

		$this->load->view("admin/index", $data);
	}

	public function update()
	{
		$banner = $this->Banner_model;		
		$validation = $this->form_validation;
		$validation->set_rules($banner->rules());

		if ($validation->run() != false) {
			$banner->update();
			$this->session->set_flashdata('success', 'Data Berhasil di Update');
			echo json_encode('sukses');
		}		
	}

	public function delete($id = null)
	{
		if (!isset($id)) show_404();

		$this->Banner_model->delete($id);
		$this->session->set_flashdata('hapus', 'Data Berhasil di Hapus');
		echo json_encode('success');					
	}


	
}