<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Kegiatan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("Jenis_laporan_model");
		$this->load->model('kritik_saran_model');
		$this->load->model("Kegiatan_model");		
		$this->load->model('ucapan_perayaan_model');
		$this->load->library('form_validation');
	}

	public function index()
	{		
		$data['content'] = 'admin/kegiatan/index';		
		$this->load->view('admin/index', $data);
	}

	public function kegiatan_data()
	{
		$data = $this->Kegiatan_model->getAll();
		echo json_encode($data);
	}

	public function index_user()
	{	
		$data['kegiatan'] = $this->Kegiatan_model->getAll();	
		$data['content'] = 'user-views/beranda/agendakegiatan';		
		$this->load->view('user-views/layouts/master', $data);
	}

	public function detail_kegiatan($slug)
	{
		$data['kegiatan'] = $this->Kegiatan_model->getBySlug($slug);
        if (empty($data['kegiatan'])) {
            show_404();
        }
        $data['content'] = 'user-views/detail/agendakegiatan';
        $data['title'] = $data['kegiatan']->kegiatan_judul;
        $this->load->view('user-views/layouts/master', $data);
	}

	public function create()
	{
		$data['content'] = 'admin/kegiatan/create';
        $this->load->view('admin/index', $data);		
	}

	public function show($id)
	{
		$data['kegiatan'] = $this->Kegiatan_model->getById($id);
        if (empty($data['kegiatan'])) {
            show_404();
        }
        $data['content'] = 'admin/kegiatan/show';
        $data['title'] = $data['kegiatan']->kegiatan_judul;
        $this->load->view('admin/index', $data);
	}

	public function store()
	{
		$kegiatan = $this->Kegiatan_model;		
		$validation = $this->form_validation;
		$validation->set_rules($kegiatan->rules());		

		if ($validation->run() != false) {
			$kegiatan->save();
			
			echo json_encode($kegiatan);
		}		
	}

	public function edit($id)
	{
		if (!isset($id)) redirect('kegiatan');

		$kegiatan = $this->Kegiatan_model;		
		$data['content'] = 'admin/kegiatan/edit';
		$data["kegiatan"] = $kegiatan->getById($id);
		if(!$data["kegiatan"]) show_404();

		$this->load->view("admin/index", $data);
	}

	public function update()
	{
		$kegiatan = $this->Kegiatan_model;
		$validation = $this->form_validation;
		$validation->set_rules($kegiatan->rules());

		if ($validation->run()) {
			$kegiatan->update();

			echo json_encode($kegiatan);
		}	
	}

	public function delete($id = null)
	{
		if (!isset($id)) show_404();

		$this->Kegiatan_model->delete($id);				
		
		echo json_encode($this);
	}
}