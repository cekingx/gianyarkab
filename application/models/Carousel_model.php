<?php

class Carousel_model extends CI_Model
{
    private $table = 'ta_carousel';

    public $carousel_id;
    public $carousel_judul;
    public $carousel_caption;
    public $carousel_link;
    public $carousel_foto;

    public function rules()
    {
        return [
            [
                'field' => 'carousel_judul',
                'label' => 'Judul',
                'rules' => 'required'
            ],
            [
                'field' => 'carousel_caption',
                'label' => 'Caption',
                'rules' => 'required'
            ]
            ];
    }

    public function getNumRows()
    {
        return $this->db->get($this->table)->num_rows();
    }

    public function getAll()
    {
        return $this->db->get($this->table)->result_array();
    }

    public function getById($carousel_id)
    {
        return $this->db->get_where($this->table, ['carousel_id' => $carousel_id])->row_array();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->carousel_judul = $post['carousel_judul'];
        $this->carousel_caption = $post['carousel_caption'];
        $this->carousel_link = $post['carousel_link'];
        $this->carousel_foto = $this->uploadImage();
        $this->db->set('carousel_tanggal', 'NOW()', FALSE);

        return $this->db->insert($this->table, $this);
    }

    public function update($carousel_id)
    {
        $post = $this->input->post();
        $this->carousel_id = $carousel_id;
        $this->carousel_judul = $post['carousel_judul'];
        $this->carousel_caption = $post['carousel_caption'];
        $this->carousel_link = $post['carousel_link'];
        if(!empty($_FILES['carousel_foto']['name'])) {
            $this->carousel_foto = $this->uploadImage();
        } else {
            $this->carousel_foto = $post['old_carousel_foto'];
        }

        $this->db->where('carousel_id', $this->carousel_id);
        return $this->db->update($this->table, $this);
    }

    public function delete($carousel_id)
    {
        $this->deleteImage($carousel_id);
        return $this->db->delete($this->table, ['carousel_id' => $carousel_id]);
    }

    private function uploadImage()
    {
        $file_name = url_title($this->carousel_judul, 'dash', true) . '-' . date('Ymd-Hms');
        $config['upload_path'] = './assets/upload/carousel';
        $config['allowed_types'] = 'gif|png|jpg';
        $config['file_name'] = $file_name;
        $config['overwrite'] = true;
        $config['max_size'] = 0;

        $this->load->library('upload', $config);
        if($this->upload->do_upload('carousel_foto')) {
            return $this->upload->data('file_name');
        }

        die($this->upload->display_errors());
        return 'default.jpg';
    }

    private function deleteImage($carousel_id)
    {
        $carousel = $this->getById($carousel_id);
        if($carousel['carousel_foto'] != 'default.jpg') {
            $file_name = explode('.', $carousel['carousel_foto'])[0];
            return array_map('unlink', glob(FCPATH . "/assets/upload/carousel/$file_name.*"));
        }
    }
}