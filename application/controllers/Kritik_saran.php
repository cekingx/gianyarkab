<?php
defined('BASEPATH') or exit("No direct script access allowed");

class Kritik_saran extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('kritik_saran_model');
        $this->load->library('form_validation');
    }

    public function kritik_saran_data()
    {
        $data = $this->kritik_saran_model->getAll();
        echo json_encode($data);
    }

    public function index_user()
    {
        $data['content'] = 'user-views/saran/daftarsaran';
        $data['kritik_saran'] = $this->kritik_saran_model->getAll();

        $this->load->view('user-views/layouts/master', $data);
    }

    public function index()
    {
        if(!empty($this->session->flashdata('message'))) {
            $data['message'] = $this->session->flashdata('message');
        }

        $data['content'] = 'admin/kritik_saran/index';

        $this->load->view('admin/index', $data);
    }

    public function show($kritik_saran_id)
    {
        $data['kritik_saran'] = $this->kritik_saran_model->getById($kritik_saran_id);
        if(empty($data['kritik_saran'])) {
            show_404();
        }

        $data['content'] = 'admin/kritik_saran/show';
        $data['title'] = $data['kritik_saran']['kritik_saran_judul'];

        $this->load->view('admin/index', $data);
    }

    public function create()
    {
        if(!empty($this->session->flashdata('error'))) {
            $data['error'] = $this->session->flashdata('error');
        }

        if(!empty($this->session->flashdata('message'))) {
            $data['message'] = $this->session->flashdata('message');
        }

        $data['content'] = 'user-views/saran/kirimsaran';

        $this->load->view('user-views/layouts/master', $data);
    }

    public function store()
    {
        $kritik_saran = $this->kritik_saran_model;
        $validation = $this->form_validation;
        $validation->set_rules($kritik_saran->rules());

        if($validation->run()) {
            $kritik_saran->save();
            $this->session->set_flashdata('message', 'Data berhasil dibuat');
            return redirect('kirimsaran');
        }  else {
            $this->session->set_flashdata('error', validation_errors());
            return redirect('kirimsaran');
        }
    }

    public function edit($kritik_saran_id)
    {

    }

    public function update()
    {

    }

    public function delete($kritik_saran_id)
    {
        if(!empty($this->kritik_saran_model->getById($kritik_saran_id))) {
            $this->kritik_saran_model->delete($kritik_saran_id);
            $this->session->set_flashdata('message', 'Data berhasil dihapus');
            echo json_encode('success');
        } else {
            show_404();
        }
    }
}