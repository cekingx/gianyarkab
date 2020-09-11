<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ucapan_perayaan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('ucapan_perayaan_model');
        $this->load->library('form_validation');
    }

    public function ucapan_perayaan_data()
    {
        $data = $this->ucapan_perayaan_model->getAll();
        echo json_encode($data);
    }

    public function index()
    {
        $data['content'] = 'admin/ucapan_perayaan/index';

        $this->load->view('admin/index', $data);
    }

    public function create()
    {
        $data['content'] = 'admin/ucapan_perayaan/create';

        $this->load->view('admin/index', $data);
    }

    public function store()
    {
        $ucapan_perayaan = $this->ucapan_perayaan_model;
        $validation = $this->form_validation;
        $validation->set_rules($ucapan_perayaan->rules());

        if($validation->run()) {
            $ucapan_perayaan->save();
            $this->session->set_flashdata('message', 'Data berhasil dibuat');
            echo json_encode('success');
        }  else {
            $this->session->set_flashdata('error', validation_errors());
            redirect('/admin/ucapan-perayaan/create');
        }
    }

    public function edit($ucapan_perayaan_id)
    {
        $data['ucapan_perayaan'] = $this->ucapan_perayaan_model->getById($ucapan_perayaan_id);
        if(empty($data['ucapan_perayaan'])) {
            show_404();
        }

        if(!empty($this->session->flashdata('error'))) {
            $data['error'] = $this->session->flashdata('error');
        }
        $data['content'] = 'admin/ucapan_perayaan/edit';
        $this->load->view('admin/index', $data);
    }

    public function update()
    {
        $post = $this->input->post();
        $ucapan_perayaan_id = $post['ucapan_perayaan_id'];
        $ucapan_perayaan = $this->ucapan_perayaan_model;
        $validation = $this->form_validation;
        $validation->set_rules($ucapan_perayaan->rules());

        if($validation->run()) {
            $ucapan_perayaan->update($ucapan_perayaan_id);
            $this->session->set_flashdata('message', 'Data berhasil diubah');
            echo json_encode('success');
        } else {
            $this->session->set_flashdata('error', validation_errors());
            echo json_encode(['error' => validation_errors()]);
        }
    }

    public function delete($ucapan_perayaan_id)
    {
        if(!empty($this->ucapan_perayaan_model->getById($ucapan_perayaan_id))) {
            $this->ucapan_perayaan_model->delete($ucapan_perayaan_id);
            $this->session->set_flashdata('message', 'Data berhasil dihapus');
            echo json_encode('success');
        } else {
            show_404();
        }
    }
}