<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kontak extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('kritik_saran_model');
        $this->load->model('kontak_model');
        $this->load->model('narahubung_model');
        $this->load->library('form_validation');
    }

    public function kontak_data()
    {
        $data = $this->kontak_model->getAll();
        echo json_encode($data);
    }

    public function index()
    {
        if(!empty($this->session->flashdata('message'))) {
            $data['message'] = $this->session->flashdata('message');
        }

        $data['content'] = 'admin/kontak/index';
        $data['kontak'] = $this->kontak_model->getAll();

        $this->load->view('admin/index', $data);
    }

    public function show($kontak_person_id)
    {
        $data['kontak'] = $this->kontak_model->getById($kontak_person_id);
        if(empty($data['kontak'])) {
            show_404();
        }

        $data['content'] = 'admin/kontak/show';
        $data['title'] = $data['kontak']['kontak_person_judul'];

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

        $data['narahubung'] = $this->narahubung_model->get();
        $data['content'] = 'user-views/kontak';
        $this->load->view('user-views/layouts/master', $data);
    }

    public function store()
    {
        $kontak = $this->kontak_model;
        $validation = $this->form_validation;
        $validation->set_rules($kontak->rules());

        if($validation->run()) {
            $kontak->save();
            $this->session->set_flashdata('message', 'Data berhasil dibuat');
            return redirect('kontak');
        }  else {
            $this->session->set_flashdata('error', validation_errors());
            return redirect('kontak');
        }
    }

    public function save_narahubung()
    {
        $narahubung = $this->narahubung_model;
        $narahubung->save();
        echo json_encode('success');
    }

    public function edit($kontak_person_id)
    {

    }

    public function update()
    {

    }

    public function delete($kontak_person_id)
    {
        if(!empty($this->kontak_model->getById($kontak_person_id))) {
            $this->kontak_model->delete($kontak_person_id);
            $this->session->set_flashdata('message', 'Data berhasil dihapus');
            echo json_encode('success');
        } else {
            show_404();
        }
    }
}