<?php

class Kritik_saran_model extends CI_Model
{
    private $table = 'ta_kritik_saran';

    public $kritik_saran_id;
    public $kritik_saran_nama;
    public $kritik_saran_alamat;
    public $kritik_saran_email;
    public $kritik_saran_foto;
    public $kritik_saran_judul;
    public $kritik_saran_isi;

    public function rules()
    {
        return [
            [
                'field' => 'kritik_saran_nama',
                'label' => 'Nama',
                'rules' => 'required'
            ],
            [
                'field' => 'kritik_saran_alamat',
                'label' => 'Alamat',
                'rules' => 'required'
            ],
            [
                'field' => 'kritik_saran_email',
                'label' => 'Email',
                'rules' => 'required'
            ],
            [
                'field' => 'kritik_saran_judul',
                'label' => 'Judul',
                'rules' => 'required'
            ],
            [
                'field' => 'kritik_saran_isi',
                'label' => 'Isi',
                'rules' => 'required'
            ],
        ];
    }

    public function getNumRows()
    {
        return $this->db->get($this->table)->num_rows();
    }

    public function getLast($number)
    {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->order_by('kritik_saran_id', 'DESC');
        $this->db->limit("$number");
        return $this->db->get()->result_array();
    }

    public function getAllDesc()
    {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->order_by('kritik_saran_id', 'DESC');
        return $this->db->get()->result_array();
    }

    public function getAll()
    {
        return $this->db->get($this->table)->result_array();
    }

    public function getById($kritik_saran_id)
    {
        return $this->db->get_where($this->table, ['kritik_saran_id' => $kritik_saran_id])->row_array();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->kritik_saran_nama = $post['kritik_saran_nama'];
        $this->kritik_saran_alamat = $post['kritik_saran_alamat'];
        $this->kritik_saran_email = $post['kritik_saran_email'];
        $this->kritik_saran_foto = $this->uploadImage();
        $this->kritik_saran_judul = $post['kritik_saran_judul'];
        $this->kritik_saran_isi = $post['kritik_saran_isi'];

        $this->db->set('kritik_saran_tanggal', 'NOW()', FALSE);
        return $this->db->insert($this->table, $this);
    }

    public function update($kritik_saran_id)
    {
        $post = $this->input->post();
        $this->kritik_saran_id = $kritik_saran_id;
        $this->kritik_saran_nama = $post['kritik_saran_nama'];
        $this->kritik_saran_alamat = $post['kritik_saran_alamat'];
        $this->kritik_saran_email = $post['kritik_saran_email'];
        $this->kritik_saran_judul = $post['kritik_saran_judul'];
        $this->kritik_saran_isi = $post['kritik_saran_isi'];
        if(!empty($_FILES['kritik_saran_foto']['name'])) {
            $this->kritik_saran_foto = $this->uploadImage();
        } else {
            $this->kritik_saran_foto = $post['old_kritik_saran_foto'];
        }

        $this->db->where('kritik_saran_id', $kritik_saran_id);
        return $this->db->update($this->table, $this);
    }

    public function delete($kritik_saran_id)
    {
        $this->deleteImage($kritik_saran_id);
        return $this->db->delete($this->table, ['kritik_saran_id' => $kritik_saran_id]);
    }

    private function uploadImage()
    {
        $file_name = url_title($this->kritik_saran_nama, 'dash', true) . "-" . date('Ymd-Hms');
        $config['upload_path'] = './assets/upload/kritiksaran';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['file_name'] = $file_name;
        $config['overwrite'] = true;
        $config['max_size'] = 0;

        $this->load->library('upload', $config);
        if($this->upload->do_upload('kritik_saran_foto')) {
            return $this->upload->data('file_name');
        }

        // die($this->upload->display_errors());
        return 'default.jpg';
    }

    private function deleteImage($kritik_saran_id)
    {
        $kritik_saran = $this->getById($kritik_saran_id);
        if($kritik_saran['kritik_saran_foto'] != 'default.jpg') {
            $file_name = explode('.', $kritik_saran['kritik_saran_foto'])[0];
            return array_map('unlink', glob(FCPATH . "/assets/upload/kritiksaran/$file_name.*"));
        }
    }
}