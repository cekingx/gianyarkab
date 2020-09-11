<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Kegiatan_model extends CI_Model
{	
	function __construct(){
        parent::__construct();
    }

	private $_table = "ta_kegiatan";	

	public $kegiatan_id;
	public $kegiatan_judul;
	public $kegiatan_deskripsi;

	public function rules()
	{
		return [
			['field' => 'judul_kegiatan', 
			'label' => 'judul_kegiatan', 
			'rules' => 'required'],

			['field' => 'isi_kegiatan',
			'label' => 'kegiatan_isi',
			'rules' => 'required']
		];
	}

	public function getLast() 
	{
		$this->db->select('*');
		$this->db->from($this->_table);
		$this->db->order_by('kegiatan_id', 'DESC');
		$this->db->limit(5);
		return $this->db->get()->result();
	}

	public function getAll()
	{		
		return $this->db->get($this->_table)->result();
	}

	public function getById($id)
	{
		return $this->db->get_where($this->_table, ["kegiatan_id" => $id])->row();
	}

	public function getBySlug($slug)
	{
		return $this->db->get_where($this->_table, ["kegiatan_slug" => $slug])->row();
	}

	public function save()
	{
		// return print_r($this->upload_image());
		$post = $this->input->post();		
		$this->kegiatan_judul = $post["judul_kegiatan"];
		$this->kegiatan_deskripsi = $post["isi_kegiatan"];		
		$this->kegiatan_slug = url_title($this->kegiatan_judul, '-', TRUE);	
		$this->db->set('kegiatan_tanggal', 'NOW()', FALSE);			
		return $this->db->insert($this->_table, $this);
	}

	public function update()
	{
		$post = $this->input->post();
		$this->kegiatan_id = $post["id_kegiatan"];
		$this->kegiatan_judul = $post["judul_kegiatan"];
		$this->kegiatan_deskripsi = $post["isi_kegiatan"];
		$this->kegiatan_slug = $post["slug_kegiatan"];
		$this->kegiatan_tanggal = $post["tanggal"];
		return $this->db->update($this->_table, $this, array('kegiatan_id' => $post["id_kegiatan"]));
	}

	public function delete($id)
	{		
		return $this->db->delete($this->_table, array("kegiatan_id" => $id));
	}

	public function kegiatanHome()
	{
		$this->db->select('*');				
		$this->db->limit(5);
		return $this->db->get($this->_table)->result();	
	}	
	
}