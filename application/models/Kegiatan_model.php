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
			['field' => 'judul', 
			'label' => 'kegiatan_judul', 
			'rules' => 'required'],

			['field' => 'isi_kegiatan',
			'label' => 'kegiatan_isi',
			'rules' => 'required'],

			// ['field' => 'tanggal',
			// 'label' => 'kegiatan_tanggal',
			// 'rules' => 'required']
		];
	}

	public function getLast($number) 
	{
		$this->db->select('*');
		$this->db->from($this->_table);
		$this->db->order_by('kegiatan_id', 'DESC');
		$this->db->limit($number);
		return $this->db->get()->result_array();
	}

	public function getAll()
	{		
		return $this->db->get($this->_table)->result();
	}

	public function getById($id)
	{
		return $this->db->get_where($this->_table, ["kegiatan_id" => $id])->row();
	}

	public function save()
	{
		// return print_r($this->upload_image());
		$post = $this->input->post();		
		$this->kegiatan_judul = $post["judul"];
		$this->kegiatan_deskripsi = $post["isi_kegiatan"];		
		$this->db->set('kegiatan_tanggal', 'NOW()', FALSE);			
		return $this->db->insert($this->_table, $this);
	}

	public function update()
	{
		$post = $this->input->post();
		$this->kegiatan_id = $post["id"];
		$this->kegiatan_judul = $post["judul"];
		$this->kegiatan_deskripsi = $post["isi_kegiatan"];
		$this->kegiatan_tanggal = $post["tanggal"];
		return $this->db->update($this->_table, $this, array('kegiatan_id' => $post["id"]));
	}

	public function delete($id)
	{		
		return $this->db->delete($this->_table, array("kegiatan_id" => $id));
	}

	private function upload_image(){
		if (!empty($_FILES["foto"]["name"])) {
            $file_ext = pathinfo($_FILES["foto"]["name"], PATHINFO_EXTENSION);
            $file_name_upload = 'foto'.'-' . date('YmdHis');
            $file_name = 'foto'.'-' . date('YmdHis') . '.' . $file_ext;
            $data = array(
                'foto' => $file_name
            );            
            $this->doUpload('./upload/kegiatan', 'foto', $file_name_upload);
            return $file_name;
        }
        return "default.png";
	}

	private function doUpload($upload_path, $key, $file_name)
	{
		$config['upload_path']		= $upload_path;
		$config['allowed_types']	= 'gif|jpg|png';
		$config['file_name']		= $file_name;
		$config['overwrite']		= true;
		$config['max_size']			= 0; //2MB
		//$config['max_width']		= 1024;
		//$config['max_height']		= 768;

		$this->load->library('upload', $config);
		$this->upload->do_upload($key);

	}
	
}