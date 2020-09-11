<?php defined('BASEPATH') OR exit('No direct script access allowed');

class artikel_berita extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("Jenis_laporan_model");
		$this->load->model("Artikel_berita_model");
		$this->load->model("Artikel_berita_media_model");		
		$this->load->library('form_validation');
	}

	public function index()
	{		
		if(!empty($this->session->flashdata('message'))) {
            $data['message'] = $this->session->flashdata('message');
        }

        $data['content'] = 'admin/artikel_berita/index';
		$this->load->view('admin/index', $data);
	}

	//show detaul artikel berita
	public function show($id)
	{
		$data['artikel_berita'] = $this->Artikel_berita_model->getById($id);		
        if (empty($data['artikel_berita'])) {
            show_404();
        }
        $data['content'] = 'admin/artikel_berita/show';
        $data['title'] = $data['artikel_berita']->artikel_berita_judul;        
        $this->load->view('admin/index', $data);
	}

	// index data artikel berita
	public function artikel_berita_data()
	{
		$data = $this->Artikel_berita_model->getAll();
		echo json_encode($data);
	}

	//halaman create artikel berita
	public function create()
	{
		$data['content'] = 'admin/artikel_berita/create';
        $this->load->view('admin/index', $data);		
	}

	//simpan ke database
	public function store()
	{
		$artikel_berita = $this->Artikel_berita_model;
		$artikel_berita_media = $this->Artikel_berita_media_model;		
		$validation = $this->form_validation;
		$validation->set_rules($artikel_berita->rules());		

		if ($validation->run() == false) {			
			$data = [
				'judul_artikel_berita' => form_error('judul_artikel_berita'),
				'isi_artikel_berita' => form_error('isi_artikel_berita')
			];
			echo json_encode($data);
		}else{
			$artikel_berita->save();
			$id_artikel = $this->db->insert_id($artikel_berita);
			$slug_artikel = $artikel_berita->artikel_berita_slug;
			$artikel_berita_media->save($id_artikel, $slug_artikel);	

			$data_artikel = [
				'artikel_berita' => $artikel_berita,
				'artikel_berita_media'=> $artikel_berita_media
			];
			echo json_encode($data_artikel);	
		}
	
	}

	//halaman edit artikel berita
	public function edit($id)
	{

		$artikel_berita = $this->Artikel_berita_model;	
		$data['content'] = 'admin/artikel_berita/edit';
		$data["artikel_berita"] = $artikel_berita->getById($id);				
		if(!$data["artikel_berita"]) show_404();

		$this->load->view("admin/index", $data);				
	}

	//simpan ke database hasil editan
	public function update()
	{		
		$artikel_berita = $this->Artikel_berita_model;				
		$validation = $this->form_validation;
		$validation->set_rules($artikel_berita->rules());

		if ($validation->run()) {
			$artikel_berita->update();						

			echo json_encode($artikel_berita);			
		}			
	}

	//hapus data artikel berita
	public function delete($id)
	{
		if (!isset($id)) show_404();

		$this->Artikel_berita_model->delete($id);
		$this->Artikel_berita_media_model->deleteAll($id);
		$this->session->set_flashdata('hapus', 'Data Berhasil di Hapus');			
		
		echo json_encode($this);
	}

	//menampilkan index media di show artikel
	public function artikel_berita_media_data($id)
	{
		$data = $this->Artikel_berita_media_model->getAll($id);
		echo json_encode($data);
	}

	//simpan ke database foto baru
	public function store_media($id, $slug)
	{
		$artikel_berita_media = $this->Artikel_berita_media_model;		
		$validation = $this->form_validation;			
		
		$artikel_berita_media->save($id, $slug);	

		echo json_encode($artikel_berita_media);	

	}

	//delete media berdasarkan id galeri
	public function delete_media($id, $id_artikel)
	{
		if (!isset($id)) show_404();

		$data["artikel_berita"] = $this->Artikel_berita_model->getById($id_artikel);
		$data["artikel_berita_media"] = $this->Artikel_berita_media_model->getAll($id_artikel);		

		if (empty($data["artikel_berita_media"])) {

			$this->session->set_flashdata('hapus', 'Data Media Tidak Tersedia');
			redirect(site_url('admin/artikel_berita'));
		}

		$this->Artikel_berita_media_model->delete($id);
		$this->session->set_flashdata('hapus', 'Data Berhasil di Hapus');				
		
		echo json_encode($data);
		
	}	

	//show berita di user
	public function index_berita_user()
	{			
		$data['artikel_berita'] = $this->Artikel_berita_model->showBeritaUser();
				
		$data['content'] = 'user-views/infogianyar/berita';		
		$this->load->view('user-views/layouts/master', $data);
	}

	//show Artikel di user
	public function index_artikel_user()
	{			
		$data['artikel_berita'] = $this->Artikel_berita_model->showArtikelUser();
				
		$data['content'] = 'user-views/infogianyar/artikel';		
		$this->load->view('user-views/layouts/master', $data);
	}

	//show detail berita di user
	public function detail_berita_user($slug)
	{			
		$data['foto'] = $this->Artikel_berita_model->detailFotoUser($slug);
		$data['artikel_berita'] = $this->Artikel_berita_model->detailBeritaArtikelUser($slug);
				
		$data['content'] = 'user-views/detail/berita';		
		$this->load->view('user-views/layouts/master', $data);
	}

	//show detail berita di user
	public function detail_artikel_user($slug)
	{			
		$data['foto'] = $this->Artikel_berita_model->detailFotoUser($slug);
		$data['artikel_berita'] = $this->Artikel_berita_model->detailBeritaArtikelUser($slug);
				
		$data['content'] = 'user-views/detail/artikel';		
		$this->load->view('user-views/layouts/master', $data);
	}
}