<?php defined('BASEPATH') OR exit('No direct script access allowed');

class artikel_berita_model extends CI_Model
{	
	function __construct(){
        parent::__construct();
    }

	private $_table = "ta_artikel_berita";	

	public $artikel_berita_id;
	public $artikel_berita_judul;
	public $artikel_berita_isi;
	public $artikel_berita_slug;
	

	public function rules()
	{
		return [
			['field' => 'judul_artikel_berita', 
			'label' => 'judul_artikel_berita', 
			'rules' => 'required'],

			['field' => 'isi_artikel_berita',
			'label' => 'isi_artikel_berita',
			'rules' => 'required'],			
		];
	}

	public function getAll()
	{		
		return $this->db->get($this->_table)->result();
	}

	public function getById($id)
	{
		return $this->db->get_where($this->_table, ["artikel_berita_id" => $id])->row();
	}

	public function save()
	{
		// return print_r($this->upload_image());
		$post = $this->input->post();		
		$this->artikel_berita_judul = $post["judul_artikel_berita"];
		$this->artikel_berita_jenis = $post["jenis_artikel_berita"];
		$this->artikel_berita_isi = $post["isi_artikel_berita"];
		$this->artikel_berita_slug = url_title($this->artikel_berita_judul, '-', TRUE);			
		$this->db->set('artikel_berita_tanggal', 'NOW()', FALSE);		
		return $this->db->insert($this->_table, $this);
	}

	public function update()
	{
		$post = $this->input->post();
		$this->artikel_berita_id = $post["id_artikel_berita"];
		$this->artikel_berita_slug = $post["slug_artikel_berita"];		
		$this->artikel_berita_judul = $post["judul_artikel_berita"];
		$this->artikel_berita_jenis = $post["jenis_artikel_berita"];
		$this->artikel_berita_isi = $post["isi_artikel_berita"];		
		$this->artikel_berita_tanggal = $post["tanggal"];
		return $this->db->update($this->_table, $this, array('artikel_berita_id' => $post["id_artikel_berita"]));	
	}

	public function delete($id)
	{		
		return $this->db->delete($this->_table, array("artikel_berita_id" => $id));
	}

	public function showBeritaUser()
	{	
		$this->db->select('*');
		$this->db->from('ta_artikel_berita');
		$this->db->join('ref_artikel_berita_media', 'ta_artikel_berita.artikel_berita_id = ref_artikel_berita_media.artikel_berita_media_artikel_berita_id');
		$this->db->where('artikel_berita_jenis', 1);
		$this->db->group_by('artikel_berita_id');
		return $this->db->get()->result();		
	}

	public function showArtikelUser()
	{	
		$this->db->select('*');
		$this->db->from('ta_artikel_berita');
		$this->db->join('ref_artikel_berita_media', 'ta_artikel_berita.artikel_berita_id = ref_artikel_berita_media.artikel_berita_media_artikel_berita_id');
		$this->db->where('artikel_berita_jenis', 0);
		$this->db->group_by('artikel_berita_id');
		return $this->db->get()->result();		
	}

	public function detailFotoUser($slug)
	{
		$this->db->select('*');
		$this->db->from('ref_artikel_berita_media');
		$this->db->join('ta_artikel_berita', 'ref_artikel_berita_media.artikel_berita_media_artikel_berita_id = ta_artikel_berita.artikel_berita_id');		
		$this->db->where('artikel_berita_slug', $slug);
		return $this->db->get()->result();
	}

	public function detailBeritaArtikelUser($slug)
	{
		$this->db->select('*');
		$this->db->from('ta_artikel_berita');		
		$this->db->where('artikel_berita_slug', $slug);
		return $this->db->get()->row();
	}	

	
}