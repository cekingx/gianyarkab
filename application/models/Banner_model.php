<?php defined('BASEPATH') OR exit('No direct script access allowed');

class banner_model extends CI_Model
{	
	function __construct(){
        parent::__construct();
    }

	private $_table = "ta_banner";	

	public $banner_id;
	public $banner_judul;	
	public $banner_file;
	public $banner_jenis;	
	

	public function rules()
	{
		return [
			
			['field' => 'judul_banner', 
			'label' => 'banner_judul', 
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
		return $this->db->get_where($this->_table, ["banner_id" => $id])->row();
	}

	public function banner_besar_user()
	{
		$this->db->select('*');		
		$this->db->where('banner_jenis', 0);
		$this->db->order_by('banner_id', 'desc');
		$this->db->limit(1);
		return $this->db->get($this->_table)->result();		

	}

	public function banner_kecil_user()
	{
		$this->db->select('*');		
		$this->db->where('banner_jenis', 1);
		$this->db->order_by('banner_id', 'desc');
		$this->db->limit(2);
		return $this->db->get($this->_table)->result();		
	}

	public function save()
	{
		// return print_r($this->upload_image());				
		$post = $this->input->post();		
		$this->banner_judul = $post["judul_banner"];		
		$this->banner_file = $this->upload_file();
		$this->banner_jenis = $post["jenis_banner"];				
		$this->db->set('banner_tanggal', 'NOW()', FALSE);			
		return $this->db->insert($this->_table, $this);
	}

	public function update()
	{
		$post = $this->input->post();
		$this->banner_id = $post["id"];
		$this->banner_judul = $post["judul_banner"];		

		if (!empty($_FILES["file_banner"]["name"])){
			$this->_deleteFile($post["id"]);			
			$this->banner_file = $this->upload_file();
		} else {
			$this->banner_file = $post["old_files"];
		}
		$this->banner_jenis = $post["jenis_banner"];
		$this->banner_tanggal = $post["tanggal_banner"];
		return $this->db->update($this->_table, $this, array('banner_id' => $post["id"]));
	}

	public function delete($id)
	{		
		$this->_deleteFile($id);
		return $this->db->delete($this->_table, array("banner_id" => $id));
	}

	private function upload_file(){
		$this->load->library('upload');	
			
		if (!empty($_FILES["file_banner"]["name"])) {			
            $file_ext = pathinfo($_FILES["file_banner"]["name"], PATHINFO_EXTENSION);
            $file_name_upload = 'file_banner'.'-' . date('YmdHis');
            $file_name = 'file_banner'.'-' . date('YmdHis') . '.' . $file_ext;
            $data = array(
                'file_banner' => $file_name
            );
            $this->upload->initialize($this->doUpload($file_name_upload));            
	        $this->upload->do_upload('file_banner');            
            // $this->doUpload('./assets/upload/banner', 'file_banner', $file_name_upload);
            return $file_name;
        }
        return "default.png";        
	}

	private function doUpload($file_name)
	{
		$config['upload_path']		= './assets/upload/banner';
		$config['allowed_types']	= 'png|jpg|gif';
		$config['file_name']		= $file_name;
		$config['overwrite']		= true;		
		$config['max_size']			= 0; //2MB
		//$config['max_width']		= 1024;
		//$config['max_height']		= 768;

		return $config;

		// $this->load->library('upload', $config);
		// $this->upload->do_upload($key);

	}

	private function _deleteFile($id)
	{
	    $banner = $this->getById($id);
	    if ($banner->banner_file != "default.png") {
		    $filename = explode(".", $banner->banner_file)[0];
			return array_map('unlink', glob(FCPATH."./assets/upload/banner/$filename.*"));
	    }
	}
	
}