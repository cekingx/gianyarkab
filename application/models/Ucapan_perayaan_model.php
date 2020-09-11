<?php

class Ucapan_perayaan_model extends CI_Model
{
    private $table = 'ta_ucapan_perayaan';

    public $ucapan_perayaan_id;
    public $ucapan_perayaan_teks;

    public function rules()
    {
        return [
            [
                'field' => 'ucapan_perayaan_teks',
                'label' => 'Teks',
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

    public function getById($ucapan_perayaan_id)
    {
        return $this->db->get_where($this->table, ['ucapan_perayaan_id' => $ucapan_perayaan_id])->row_array();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->ucapan_perayaan_teks = $post['ucapan_perayaan_teks'];

        return $this->db->insert($this->table, $this);
    }

    public function update($ucapan_perayaan_id)
    {
        $post = $this->input->post();
        $this->ucapan_perayaan_id = $ucapan_perayaan_id;
        $this->ucapan_perayaan_teks = $post['ucapan_perayaan_teks'];

        $this->db->where('ucapan_perayaan_id', $this->ucapan_perayaan_id);
        return $this->db->update($this->table, $this);
    }

    public function delete($ucapan_perayaan_id)
    {
        return $this->db->delete($this->table, ['ucapan_perayaan_id' => $ucapan_perayaan_id]);
    }
}