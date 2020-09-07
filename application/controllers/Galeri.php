<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Galeri extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		
		$this->load->model("Galeri_media_model");
		$this->load->model("Galeri_model");		
		$this->load->library('form_validation');
	}

	//menampilkan galeri
	public function index()
	{
		if(!empty($this->session->flashdata('message'))) {
            $data['message'] = $this->session->flashdata('message');
        }

        $data['content'] = 'admin/galeri/index';
		$this->load->view('admin/index', $data);

		// $data['content'] = 'galeri/show';
		// $data["galeri"] = $this->Galeri_model->getAll();
		// $this->load->view('layouts/master', $data);
	}

	public function show($id)
	{
		$data['galeri'] = $this->Galeri_model->getById($id);		
        if (empty($data['galeri'])) {
            show_404();
        }
        $data['content'] = 'admin/galeri/show';
        $data['title'] = $data['galeri']->galeri_judul;
        // echo json_encode($data);
        $this->load->view('admin/index', $data);
	}

	public function galeri_data()
	{
		$data = $this->Galeri_model->getAll();
		echo json_encode($data);
	}

	public function galeri_media_data($id)
	{
		$data = $this->Galeri_media_model->getAll($id);
		echo json_encode($data);
	}

	//menampilkan halaman create galeri
	public function create()
	{
		$data['content'] = 'admin/galeri/create';		
		$this->load->view('admin/index', $data);
	}	

	//store galeri include gambar dan link video
	public function store()
	{
		$galeri = $this->Galeri_model;
		$galeri_media = $this->Galeri_media_model;		
		$validation = $this->form_validation;
		$validation->set_rules($galeri->rules());		 	

		if ($validation->run() == false) {
			$data = [
				'judul' => form_error('judul'),
				'deskripsi' => form_error('deskripsi')											
			];
			echo json_encode($data);		
			
		} else {

			$galeri->save();
			$id_galeri = $this->db->insert_id($galeri);
			$galeri_media->save($id_galeri);						
			// $this->session->set_flashdata('success', 'Data Berhasil disimpan');
			$data_galeri = [
				'galeri' => $galeri,
				'galeri_media'=> $galeri_media
			];
			echo json_encode($data_galeri);		
					
		}

		// $data['content'] = 'galeri/create';
		// $data["galeri"] = $this->Galeri_model->getAll();			
		// $this->load->view('layouts/master', $data);
		// redirect(site_url('admin/Galeri/create'));
	}

	//menampilkan halaman edit galeri
	public function edit($id)
	{
		$galeri = $this->Galeri_model;	
		$data['content'] = 'admin/galeri/edit';
		$data["galeri"] = $galeri->getById($id);				
		if(!$data["galeri"]) show_404();

		$this->load->view("admin/index", $data);
	}

	//edit hanya galeri tidak medianya
	public function update()
	{		

		$galeri = $this->Galeri_model;		
		$validation = $this->form_validation;
		$validation->set_rules($galeri->rules());

		if ($validation->run()) {
			$galeri->update();

			echo json_encode($galeri);
			// $this->session->set_flashdata('success', 'Data Berhasil di Update');
		}			
	}

	//hapus galeri sekaligus media
	public function delete($id = null)
	{
		if (!isset($id)) show_404();

		$this->Galeri_model->delete($id);
		$this->Galeri_media_model->deleteAll($id);
		$this->session->set_flashdata('hapus', 'Data Berhasil di Hapus');			
		
		echo json_encode($this);
		// redirect(site_url('admin/galeri'));
	}

	//menampilkan media berdasarkan data galeri
	public function index_media($id)
	{		
		$data['content'] = 'galeri/show_detail';
		$data["galeri"] = $this->Galeri_model->getById($id);
		$data["galeri_media"] = $this->Galeri_media_model->getAll($id);		
		$this->load->view('layouts/master', $data);
	}	

	//input data/store media berdasarkan id galeri
	public function store_media($id)
	{
		$galeri_media = $this->Galeri_media_model;		
		$validation = $this->form_validation;			
		
		$galeri_media->save($id);	

		echo json_encode($galeri_media);	

		// redirect('/admin/galeri/media/'.$id);			
		// $this->session->set_flashdata('success', 'Data Berhasil disimpan');		

		// $data['content'] = 'galeri/show_detail';
		// $data["galeri"] = $this->Galeri_model->getById($id);
		// $data["galeri_media"] = $this->Galeri_media_model->getAll($id);		
		// $this->load->view('layouts/master', $data);
	}

	//delete media berdasarkan id galeri
	public function delete_media($id = null, $id_galeri)
	{
		if (!isset($id)) show_404();

		$data["galeri"] = $this->Galeri_model->getById($id_galeri);
		$data["galeri_media"] = $this->Galeri_media_model->getAll($id_galeri);		

		if (empty($data["galeri_media"])) {

			$this->session->set_flashdata('hapus', 'Data Media Tidak Tersedia');
			redirect(site_url('admin/galeri'));
		}

		$this->Galeri_media_model->delete($id);
		$this->session->set_flashdata('hapus', 'Data Berhasil di Hapus');				
		
		echo json_encode($data);
		// $data['content'] = 'galeri/show_detail';
		// $data["galeri"] = $this->Galeri_model->getById($id_galeri);
		// $data["galeri_media"] = $this->Galeri_media_model->getAll($id_galeri);		
		// $this->load->view('layouts/master', $data);
	}	
	
}