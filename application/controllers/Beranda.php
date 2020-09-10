<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		
		$this->load->model("Banner_model");		
		$this->load->library('form_validation');
	}

	public function index()
	{	$banner = $this->Banner_model;
		$data['banner_besar'] = $banner->banner_besar_user();	
		$data['banner_kecil'] = $banner->banner_kecil_user();
		// return var_dump($data['banner_kecil']);
		// die;		
		$data['content'] = 'user-views/dashboard';		
		$this->load->view('user-views/layouts/master', $data);
	}

	public function galeri_foto()
	{
		$data['content'] = 'user-views/galeri/foto';		
		$this->load->view('user-views/layouts/master', $data);
	}

	public function detail_foto()
	{
		$data['content'] = 'user-views/detail/foto';		
		$this->load->view('user-views/layouts/master', $data);
	}

	public function add_view()
	{
		$data['content'] = 'admin/kegiatan/create';
        $this->load->view('admin/index', $data);
		// $this->load->view("admin/kegiatan/create");	
	}

	public function add()
	{
		$kegiatan = $this->Kegiatan_model;		
		$validation = $this->form_validation;
		$validation->set_rules($kegiatan->rules());		

		if ($validation->run() != false) {
			$kegiatan->save();
			// $id_kegiatan = $this->db->insert_id($kegiatan);			
			// $kegiatan_foto->save($id_kegiatan);
			
			$this->session->set_flashdata('success', 'Berhasil disimpan');
		}

		redirect(site_url('admin/kegiatan/create'));		
	}

	public function edit($id = null)
	{
		if (!isset($id)) redirect('kegiatan');

		$kegiatan = $this->Kegiatan_model;
		$validation = $this->form_validation;
		$validation->set_rules($kegiatan->rules());

		if ($validation->run()) {
			$kegiatan->update();
			$this->session->set_flashdata('success', 'Berhasil di Update');
		}	

		$data['content'] = 'kegiatan/edit';
		$data["kegiatan"] = $kegiatan->getById($id);
		if(!$data["kegiatan"]) show_404();

		$this->load->view("admin/index", $data);
	}

	public function delete($id = null)
	{
		if (!isset($id)) show_404();

		$this->Kegiatan_model->delete($id);
		$this->session->set_flashdata('hapus', 'Berhasil di Hapus');			
		
		redirect(site_url('kegiatan'));
	}
}