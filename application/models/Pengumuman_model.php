<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengumuman_model extends CI_Model
{
    private $table = 'ta_pengumuman';

    public $pengumuman_id;
    public $pengumuman_judul;
    public $pengumuman_slug;
    public $pengumuman_isi;
    public $pengumuman_user_id;

    public function rules()
    {
        return [
            [
                'field' => 'pengumuman_judul',
                'label' => 'Judul',
                'rules' => 'required'
            ],
            [
                'field' => 'pengumuman_isi',
                'label' => 'Isi',
                'rules' => 'required'
            ],
        ];
    }

    public function data($number, $offset)
    {   
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->limit($number, $offset);
        $this->db->order_by('pengumuman_id', 'DESC');
        return $this->db->get()->result_array();
    }

    public function getNumRows()
    {
        return $this->db->get($this->table)->num_rows();
    }

    public function getLast($number)
    {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->order_by('pengumuman_id', 'DESC');
        $this->db->limit($number);
        return $this->db->get()->result_array();
    }

    public function getAllDesc()
    {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->order_by('pengumuman_id', 'DESC');
        return $this->db->get()->result_array();
    }

    public function getAll()
    {
        return $this->db->get($this->table)->result_array();
    }

    public function getById($pengumuman_id)
    {
        return $this->db->get_where($this->table, ['pengumuman_id' => $pengumuman_id])->row_array();
    }

    public function getBySlug($pengumuman_slug)
    {
        return $this->db->get_where($this->table, ['pengumuman_slug' => $pengumuman_slug])->row_array();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->pengumuman_judul = $post['pengumuman_judul'];
        $this->pengumuman_slug = url_title($this->pengumuman_judul, '-', TRUE);
        $this->pengumuman_isi = $post['pengumuman_isi'];

        $this->db->set('pengumuman_tanggal', 'NOW()', FALSE);
        return $this->db->insert($this->table, $this);
    }

    public function update($pengumuman_id)
    {
        $post = $this->input->post();
        $this->pengumuman_id = $pengumuman_id;
        $this->pengumuman_judul = $post['pengumuman_judul'];
        $this->pengumuman_slug = url_title($this->pengumuman_judul, '-', TRUE);
        $this->pengumuman_isi = $post['pengumuman_isi'];

        $this->db->where('pengumuman_id', $this->pengumuman_id);
        return $this->db->update($this->table, $this);
    }

    public function delete($pengumuman_id)
    {
        return $this->db->delete($this->table, array('pengumuman_id' => $pengumuman_id));
    }
}