<?php

class Jabatanbupati_model extends CI_Model
{
    private $table = 'ref_jabatan_bupati';

    public $jabatan_bupati_id;
    public $jabatan_bupati_nama;
    public $jabatan_bupati_foto = 'default.jpg';
    public $jabatan_bupati_masa_jabatan;

    public function rules()
    {
        return [
            [
                'field' => 'jabatan_bupati_nama',
                'label' => 'Nama Bupati',
                'rules' => 'required'
            ],
            [
                'field' => 'jabatan_bupati_masa_jabatan',
                'label' => 'Masa Jabatan',
                'rules' => 'required'
            ]
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->table)->result_array();
    }

    public function getById($jabatan_bupati_id)
    {
        return $this->db->get_where($this->table, ['jabatan_bupati_id' => $jabatan_bupati_id])->row_array();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->jabatan_bupati_nama = $post['jabatan_bupati_nama'];
        $this->jabatan_bupati_masa_jabatan = $post['jabatan_bupati_masa_jabatan'];
        $this->jabatan_bupati_foto = $this->uploadImage();
        $this->db->set('jabatan_bupati_tanggal', 'NOW()', FALSE);

        return $this->db->insert($this->table, $this);
    }

    public function update($jabatan_bupati_id)
    {
        $post = $this->input->post();
        $this->jabatan_bupati_id = $jabatan_bupati_id;
        $this->jabatan_bupati_nama = $post['jabatan_bupati_nama'];
        $this->jabatan_bupati_masa_jabatan = $post['jabatan_bupati_masa_jabatan'];
        if(!empty($_FILES['jabatan_bupati_foto']['name'])) {
            $this->jabatan_bupati_foto = $this->uploadImage();
        } else {
            $this->jabatan_bupati_foto = $post['old_jabatan_bupati_foto'];
        }
        
        $this->db->where('jabatan_bupati_id', $this->jabatan_bupati_id);
        return $this->db->update($this->table, $this);
    }

    public function delete($jabatan_bupati_id)
    {
        $this->deleteImage($jabatan_bupati_id);
        return $this->db->delete($this->table, ['jabatan_bupati_id' => $jabatan_bupati_id]);
    }

    private function uploadImage()
    {
        $file_name = url_title($this->jabatan_bupati_nama, 'dash', true) . "-" . date("Ymd-Hms");
        $config['upload_path'] = '/var/www/html/upload/jabatan_bupati/';
        $config['allowed_types'] = 'gif|png|jpg';
        $config['file_name'] = $file_name;
        $config['overwrite'] = true;
        $config['max_size'] = 2048;

        $this->load->library('upload', $config);
        if($this->upload->do_upload('jabatan_bupati_foto')) {
            return $this->upload->data('file_name');
        }

        // die($this->upload->display_errors());
        return 'default.jpg';
    }

    private function deleteImage($jabatan_bupati_id)
    {
        $jabatan_bupati = $this->getById($jabatan_bupati_id);
        if($jabatan_bupati['jabatan_bupati_foto'] != 'default.jpg') {
            $file_name = explode('.', $jabatan_bupati['jabatan_bupati_foto'])[0];
            return array_map('unlink', glob("/var/www/html/upload/jabatan_bupati/$file_name.*"));
        }
    }
}