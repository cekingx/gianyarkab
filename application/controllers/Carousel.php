<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Carousel extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('carousel_model');
        $this->load->library('form_validation');
    }

    public function carousel_data()
    {
        $data = $this->carousel_model->getAll();

        echo json_encode($data);
    }

    public function index()
    {
        if(!empty($this->session->flashdata('message'))) {
            $data['message'] = $this->session->flashdata('message');
        }

        $data['content'] = 'admin/carousel/index';
        $this->load->view('admin/index', $data);
    }

    public function show($carousel_id)
    {
        $data['carousel'] = $this->carousel_model->getById($carousel_id);
        if(empty($data['carousel'])) {
            show_404();
        }

        $data['content'] = 'admin/carousel/show';
        $data['title'] = $data['carousel']['carousel_judul'];
        $this->load->view('admin/index', $data);
    }

    public function create()
    {
        if(!empty($this->session->flashdata('error'))) {
            $data['error'] = $this->session->flashdata('error');
        }

        $data['content'] = 'admin/carousel/create';
        $this->load->view('admin/index', $data);
    }

    public function store()
    {
        $carousel = $this->carousel_model;
        $validation = $this->form_validation;
        $validation->set_rules($carousel->rules());

        if($validation->run()) {
            $carousel->save();
            $this->session->set_flashdata('message', 'Data berhasil dibuat');
            return redirect('admin/carousel');
        } else {
            $this->session->set_flashdata('error', validation_errors());
            return redirect('admin/carousel/create');
        }
    }

    public function edit($carousel_id)
    {
        $data['carousel'] = $this->carousel_model->getById($carousel_id);
        if(empty($data['carousel'])) {
            show_404();
        }

        if(!empty($this->session->flashdata('error'))) {
            $data['error'] = $this->session->flashdata('error');
        }

        $data['content'] = 'admin/carousel/edit';
        $data['title'] = $data['carousel']['carousel_judul'];
        $this->load->view('admin/index', $data);
    }

    public function update()
    {
        $post = $this->input->post();
        $carousel_id = $post['carousel_id'];
        $carousel = $this->carousel_model;
        $validation = $this->form_validation;
        $validation->set_rules($carousel->rules());

        if($validation->run()) {
            $carousel->update($carousel_id);
            $this->session->set_flashdata('message', 'Data berhasil diubah');
            redirect('/admin/carousel');
        } else {
            $this->session->set_flashdata('error', validation_errors());
            redirect("/admin/carousel/edit/$carousel_id");
        }
    }

    public function delete($carousel_id)
    {
        if(!empty($this->carousel_model->getById($carousel_id))) {
            $this->carousel_model->delete($carousel_id);
            $this->session->set_flashdata('message', 'Data berhasil dihapus');
            echo json_encode('success');
        } else {
            show_404();
        }
    }
}