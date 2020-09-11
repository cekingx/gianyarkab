<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Jenis_laporan_model extends CI_Model
{	
	function __construct(){
        parent::__construct();
    }

	private $_table = "ref_jenis_laporan";	

	public $jenis_laporan_id;
	public $jenis_laporan_nama;		

	public function rules()
	{
		return [
			['field' => 'jenis_nama', 
			'label' => 'jenis_nama_laporan', 
			'rules' => 'required'],			
		];
	}

	public function getAll()
	{		
		return $this->db->get($this->_table)->result();
	}

	public function getById($id)
	{
		return $this->db->get_where($this->_table, ["jenis_laporan_id" => $id])->row();
	}
	
	public function save()
	{
		// return print_r($this->upload_image());
		$post = $this->input->post();		
		$this->jenis_laporan_nama = $post["jenis_nama"];		
		return $this->db->insert($this->_table, $this);
	}

	public function update()
	{
		$post = $this->input->post();
		$this->jenis_laporan_id = $post["id_jenis"];
		$this->jenis_laporan_nama = $post["jenis_nama"];					
		return $this->db->update($this->_table, $this, array('jenis_laporan_id' => $post["id_jenis"]));
	}

	public function delete($id)
	{		
		return $this->db->delete($this->_table, array("jenis_laporan_id" => $id));
	}
	
	
}