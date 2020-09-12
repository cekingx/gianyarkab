<?php defined('BASEPATH') OR exit('No direct script access allowed');

class media_cetak_model extends CI_Model
{	
	function __construct(){
        parent::__construct();
    }

	private $_table = "ta_media_cetak";	

	public $media_cetak_id;
	public $media_cetak_nama;	
	public $media_cetak_file;	
	

	public function rules()
	{
		return [
			
			['field' => 'media_cetak_nama', 
			'label' => 'nama', 
			'rules' => 'required'],								
		];
	}

	public function getNumRows()
	{
		return $this->db->get($this->_table)->num_rows();
	}

	public function getAll()
	{			
		return $this->db->get($this->_table)->result();
	}

	public function getById($id)
	{
		return $this->db->get_where($this->_table, ["media_cetak_id" => $id])->row();
	}

	public function save()
	{
		// return print_r($this->upload_image());		

		$post = $this->input->post();		
		$this->media_cetak_nama = $post["media_cetak_nama"];		
		$this->media_cetak_file = $this->upload_file();
		$this->db->set('media_cetak_tanggal', 'NOW()', FALSE);		
		return $this->db->insert($this->_table, $this);
	}

	public function update()
	{
		$post = $this->input->post();
		$this->media_cetak_id = $post["id_media_cetak"];
		$this->media_cetak_nama = $post["media_cetak_nama"];		

		if (!empty($_FILES["file_media_cetak"]["name"])){
			$this->_deleteFile($post["id"]);			
			$this->media_cetak_file = $this->upload_file();
		} else {
			$this->media_cetak_file = $post["old_files"];
		}

		$this->media_cetak_tanggal = $post["tanggal"];
		return $this->db->update($this->_table, $this, array('media_cetak_id' => $post["id_media_cetak"]));
	}

	public function delete($id)
	{		
		$this->_deleteFile($id);
		return $this->db->delete($this->_table, array("media_cetak_id" => $id));
	}

	private function upload_file(){		
		if (!empty($_FILES["file_media_cetak"]["name"])) {

            $file_ext = pathinfo($_FILES["file_media_cetak"]["name"], PATHINFO_EXTENSION);
            $file_name_upload = 'file_media_cetak'.'-' . date('YmdHis');
            $file_name = 'file_media_cetak'.'-' . date('YmdHis') . '.' . $file_ext;
            $data = array(
                'file_media_cetak' => $file_name
            );            
            $this->doUpload('./assets/upload/media_cetak', 'file_media_cetak', $file_name_upload);
            return $file_name;
        }        
	}

	private function doUpload($upload_path, $key, $file_name)
	{
		$config['upload_path']		= $upload_path;
		$config['allowed_types']	= 'pdf';
		$config['file_name']		= $file_name;
		$config['overwrite']		= true;
		$config['max_size']			= 0; //2MB
		//$config['max_width']		= 1024;
		//$config['max_height']		= 768;

		$this->load->library('upload', $config);
		$this->upload->do_upload($key);

	}

	private function _deleteFile($id)
	{
	    $media_cetak = $this->getById($id);
	    if ($media_cetak->media_cetak_file != "default.pdf") {
		    $filename = explode(".", $media_cetak->media_cetak_file)[0];
			return array_map('unlink', glob(FCPATH."./assets/upload/media_cetak/$filename.pdf"));
	    }
	}
	
}