<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengumuman extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Jenis_laporan_model");
        $this->load->model('kritik_saran_model');
        $this->load->model('pengumuman_model');
		$this->load->model('ucapan_perayaan_model');
        $this->load->library('form_validation');
        $this->load->library('pagination');
    }

    public function index_user()
    {
        $data['content'] = 'user-views/beranda/pengumuman';
        $pengumuman_count = $this->pengumuman_model->getNumRows();
        $config['base_url'] = base_url('pengumuman');
        $config['total_rows'] = $pengumuman_count;
        $config['per_page'] = 3;

        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

        $this->pagination->initialize($config);
        $from = $this->uri->segment(2);
        $data['pengumuman'] = $this->pengumuman_model->data($config['per_page'], $from);

        $this->load->view('user-views/layouts/master', $data);
    }

    public function show_user($pengumuman_slug)
    {
        $data['pengumuman'] = $this->pengumuman_model->getBySlug($pengumuman_slug);
        if(empty($data['pengumuman'])) {
            show_404();
        }

        $data['content'] = 'user-views/detail/pengumuman';
        $this->load->view('user-views/layouts/master', $data);
    }

    public function pengumuman_data()
    {
        $data = $this->pengumuman_model->getAll();
        echo json_encode($data);
    }

    public function index()
    {
        if(!empty($this->session->flashdata('message'))) {
            $data['message'] = $this->session->flashdata('message');
        }

        $data['content'] = 'admin/pengumuman/index';
		$this->load->view('admin/index', $data);
    }

    public function show($pengumuman_id)
    {
        $data['pengumuman'] = $this->pengumuman_model->getById($pengumuman_id);
        if (empty($data['pengumuman'])) {
            show_404();
        }

        $data['content'] = 'admin/pengumuman/show';
        $data['title'] = $data['pengumuman']['pengumuman_judul'];
        $this->load->view('admin/index', $data);
    }

    public function create()
    {
        if(!empty($this->session->flashdata('error'))) {
            $data['error'] = $this->session->flashdata('error');
        }

		$data['content'] = 'admin/pengumuman/create';
		$this->load->view('admin/index', $data);
    }

    public function store()
    {
        $pengumuman = $this->pengumuman_model;
        $validation = $this->form_validation;
        $validation->set_rules($pengumuman->rules());

        if ($validation->run()) {
            $pengumuman->save();
            $this->session->set_flashdata('message', 'Pengumuman berhasil dibuat');
            // redirect('/admin/pengumuman');
            echo json_encode('success');
        } else {
            $this->session->set_flashdata('error', validation_errors());
            redirect('/admin/pengumuman/create');
        }
    }

    public function edit($pengumuman_id)
    {
        $data['pengumuman'] = $this->pengumuman_model->getById($pengumuman_id);
        if(empty($data['pengumuman'])) {
            show_404();
        }

        if(!empty($this->session->flashdata('error'))) {
            $data['error'] = $this->session->flashdata('error');
        }

        $data['content'] = 'admin/pengumuman/edit';
        $this->load->view('admin/index', $data);
    }
    
    public function update()
    {
        $post = $this->input->post();
        $pengumuman_id = $post['pengumuman_id'];
        $pengumuman = $this->pengumuman_model;
        $validation = $this->form_validation;
        $validation->set_rules($pengumuman->rules());

        if ($validation->run()) {
            $pengumuman->update($pengumuman_id);
            $this->session->set_flashdata('message', 'Pengumuman berhasil diubah');
            echo json_encode('success');
        } else {
            $this->session->set_flashdata('error', validation_errors());
            redirect("/admin/pengumuman/edit/$pengumuman_id");
        }
    }

    public function delete($pengumuman_id)
    {
        if(!empty($this->pengumuman_model->getById($pengumuman_id))) {
            $this->pengumuman_model->delete($pengumuman_id);
            $this->session->set_flashdata('message', 'Data berhasil dihapus');
            echo json_encode('success');
        } else {
            show_404();
        }
    }
}