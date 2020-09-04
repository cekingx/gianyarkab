<?php

class Subdomain_model extends CI_Model
{
    private $table = 'ref_sub_domain';

    public $sub_domain_id;
    public $sub_domain_link;
    public $sub_domain_deskripsi;
    public $sub_domain_user_id;

    public function rules() 
    {
        return [
            [
                'field' => 'sub_domain_link',
                'label' => 'Link',
                'rules' => 'required'
            ],
            [
                'field' => 'sub_domain_deskripsi',
                'label' => 'Deskripsi',
                'rules' => 'required'
            ],
        ];
    }

    public function getAll() 
    {
        return $this->db->get($this->table)->result_array();
    }

    public function getById($sub_domain_id) 
    {
        return $this->db->get_where($this->table, ['sub_domain_id' => $sub_domain_id])->row_array();
    }
    
    public function save()
    {
        $post = $this->input->post();
        $this->sub_domain_link = $post['sub_domain_link'];
        $this->sub_domain_deskripsi = $post['sub_domain_deskripsi'];

        return $this->db->insert($this->table, $this);
    }

    public function update($sub_domain_id)
    {
        $post = $this->input->post();
        $this->sub_domain_id = $sub_domain_id;
        $this->sub_domain_link = $post['sub_domain_link'];
        $this->sub_domain_deskripsi = $post['sub_domain_deskripsi'];

        $this->db->where('sub_domain_id', $sub_domain_id);
        return $this->db->update($this->table, $this);
    }

    public function delete($sub_domain_id)
    {
        return $this->db->delete($this->table, ['sub_domain_id' => $sub_domain_id]);
    }
}