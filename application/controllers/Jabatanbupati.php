<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jabatanbupati extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('jabatanbupati_model');
        $this->load->library('form_validation');
    }

    public function index_user()
    {
        $data['jabatanbupati'] = $this->jabatanbupati_model->getAll();
        $data['content'] = 'user-views/profile/bupatidarimasa';

        $this->load->view('user-views/layouts/master', $data);
    }

    public function jabatan_bupati_data()
    {
        $jabatan_bupati = $this->jabatanbupati_model->getAll();

        echo json_encode($jabatan_bupati);
    }

    public function index()
    {
        if(!empty($this->session->flashdata('message'))) {
            $data['message'] = $this->session->flashdata('message');
        }

        $data['content'] = 'admin/jabatan_bupati/index';

        $this->load->view('admin/index', $data);
    }

    public function show($jabatan_bupati_id)
    {
        $data['jabatanbupati'] = $this->jabatanbupati_model->getById($jabatan_bupati_id);
        if(empty($data['jabatanbupati'])) {
            show_404();
        }

        $data['content'] = 'admin/jabatan_bupati/show';
        $data['title'] = $data['jabatanbupati']['jabatan_bupati_nama'];

        $this->load->view('admin/index', $data);
    }

    public function create()
    {
        if(!empty($this->session->flashdata('error'))) {
            $data['error'] = $this->session->flashdata('error');
        }

        $data['content'] = 'admin/jabatan_bupati/create';
        $this->load->view('admin/index', $data);
    }

    public function store()
    {
        $jabatanbupati = $this->jabatanbupati_model;
        $validation = $this->form_validation;
        $validation->set_rules($jabatanbupati->rules());

        if($validation->run()) {
            $jabatanbupati->save();
            $this->session->set_flashdata('message', 'Data berhasil dibuat');
            return redirect('admin/jabatan-bupati');
        } else {
            $this->session->set_flashdata('error', validation_errors());
            return redirect('admin/jabatan-bupati/create');
        }
    }

    public function edit($jabatan_bupati_id)
    {
        $data['jabatanbupati'] = $this->jabatanbupati_model->getById($jabatan_bupati_id);
        if(empty($data['jabatanbupati'])) {
            show_404();
        }

        if(!empty($this->session->flashdata('error'))) {
            $data['error'] = $this->session->flashdata('error');
        }

        $data['content'] = 'admin/jabatan_bupati/edit';
        $data['title'] = $data['jabatanbupati']['jabatan_bupati_nama'];
        $this->load->view('admin/index', $data);
    }

    public function update()
    {
        $post = $this->input->post();
        $jabatan_bupati_id = $post['jabatan_bupati_id'];
        $jabatanbupati = $this->jabatanbupati_model;
        $validation = $this->form_validation;
        $validation->set_rules($jabatanbupati->rules());

        if($validation->run()) {
            $jabatanbupati->update($jabatan_bupati_id);
            $this->session->set_flashdata('message', 'Data berhasil diubah');
            redirect('/admin/jabatan-bupati');
        } else {
            $this->session->set_flashdata('error', validation_errors());
            redirect("/admin/jabatan-bupati/edit/$jabatan_bupati_id");
        }
    }

    public function delete($jabatan_bupati_id)
    {
        if(!empty($this->jabatanbupati_model->getById($jabatan_bupati_id))) {
            $this->jabatanbupati_model->delete($jabatan_bupati_id);
            $this->session->set_flashdata('message', 'Data berhasil dihapus');
            echo json_encode('success');
        } else {
            show_404();
        }
    }
}