<?php

class Narahubung_model extends CI_Model
{
    private $table = 'ref_narahubung';

    public $narahubung_email;
    public $narahubung_telp;
    public $narahubung_fax;
    public $narahubung_alamat;

    public function get()
    {
        return $this->db->get_where($this->table, ['narahubung_id' => 1])->row_array();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->narahubung_email = $post['narahubung_email'];
        $this->narahubung_telp = $post['narahubung_telp'];
        $this->narahubung_fax = $post['narahubung_fax'];
        $this->narahubung_alamat = $post['narahubung_alamat'];

        if(!empty($this->get())) {
            $this->db->where('narahubung_id', 1);
            return $this->db->update($this->table, $this);
        } else {
            return $this->db->insert($this->table, $this);
        }
    }
}