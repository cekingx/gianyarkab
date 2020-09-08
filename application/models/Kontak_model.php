<?php

class Kontak_model extends CI_Model
{
    private $table = 'ta_kontak_person';

    public $kontak_person_id;
    public $kontak_person_nama;
    public $kontak_person_alamat;
    public $kontak_person_email;
    public $kontak_person_judul;
    public $kontak_person_isi_aduan;
    
    public function rules()
    {
        return [
            [
                'field' => 'kontak_person_nama',
                'label' => 'Nama',
                'rules' => 'required'
            ],
            [
                'field' => 'kontak_person_alamat',
                'label' => 'Alamat',
                'rules' => 'required'
            ],
            [
                'field' => 'kontak_person_email',
                'label' => 'Email',
                'rules' => 'required'
            ],
            [
                'field' => 'kontak_person_judul',
                'label' => 'Judul',
                'rules' => 'required'
            ],
            [
                'field' => 'kontak_person_isi_aduan',
                'label' => 'Isi Aduan',
                'rules' => 'required'
            ],
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->table)->result_array();
    }

    public function getById($kontak_person_id)
    {
        return $this->db->get_where($this->table, ['kontak_person_id' => $kontak_person_id])->row_array();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->kontak_person_nama = $post['kontak_person_nama'];
        $this->kontak_person_alamat = $post['kontak_person_alamat'];
        $this->kontak_person_email = $post['kontak_person_email'];
        $this->kontak_person_judul = $post['kontak_person_judul'];
        $this->kontak_person_isi_aduan = $post['kontak_person_isi_aduan'];

        $this->db->set('kontak_person_tanggal', 'NOW()', FALSE);
        return $this->db->insert($this->table, $this);
    }

    public function update($kontak_person_id)
    {
        $post = $this->input->post();
        $this->kontak_person_id = $kontak_person_id;
        $this->kontak_person_nama = $post['kontak_person_nama'];
        $this->kontak_person_alamat = $post['kontak_person_alamat'];
        $this->kontak_person_email = $post['kontak_person_email'];
        $this->kontak_person_judul = $post['kontak_person_judul'];
        $this->kontak_person_isi_aduan = $post['kontak_person_isi_aduan'];

        $this->db->where('kontak_person_id', $kontak_person_id);
        return $this->db->update($this->table, $this);
    }

    public function delete($kontak_person_id)
    {
        return $this->db->delete($this->table, ['kontak_person_id' => $kontak_person_id]);
    }
}