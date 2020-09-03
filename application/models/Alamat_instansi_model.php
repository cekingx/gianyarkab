<?php

class Alamat_instansi_model extends CI_Model
{
    private $table = 'ref_alamat_instansi';

    public $alamat_instansi_id;
    public $alamat_instansi_nama;
    public $alamat_instansi_alamat;
    public $alamat_instansi_telp;
    public $alamat_instansi_email;

    public function rules()
    {
        return [
            [
                'field' => 'alamat_instansi_nama',
                'label' => 'Nama Instansi',
                'rules' => 'required'
            ],
            [
                'field' => 'alamat_instansi_alamat',
                'label' => 'Alamat Instansi',
                'rules' => 'required'
            ],
            [
                'field' => 'alamat_instansi_telp',
                'label' => 'Telepon Instansi',
                'rules' => 'required'
            ],
            [
                'field' => 'alamat_instansi_email',
                'label' => 'Email Instansi',
                'rules' => 'required'
            ],
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->table)->result_array();
    }

    public function getById($alamat_instansi_id)
    {
        return $this->db->get_where($this->table, ['alamat_instansi_id' => $alamat_instansi_id])->row_array();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->alamat_instansi_nama = $post['alamat_instansi_nama'];
        $this->alamat_instansi_alamat = $post['alamat_instansi_alamat'];
        $this->alamat_instansi_telp = $post['alamat_instansi_telp'];
        $this->alamat_instansi_email = $post['alamat_instansi_email'];

        return $this->db->insert($this->table, $this);
    }

    public function update($alamat_instansi_id)
    {
        $post = $this->input->post();
        $this->alamat_instansi_id = $alamat_instansi_id;
        $this->alamat_instansi_nama = $post['alamat_instansi_nama'];
        $this->alamat_instansi_alamat = $post['alamat_instansi_alamat'];
        $this->alamat_instansi_telp = $post['alamat_instansi_telp'];
        $this->alamat_instansi_email = $post['alamat_instansi_email'];

        $this->db->where('alamat_instansi_id', $alamat_instansi_id);
        return $this->db->update($this->table, $this);
    }

    public function delete($alamat_instansi_id)
    {
        return $this->db->delete($this->table, ['alamat_instansi_id' => $alamat_instansi_id]);
    }
}