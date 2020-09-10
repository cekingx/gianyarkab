<?php defined('BASEPATH') OR exit('No direct script access allowed');

class artikel_berita_media_model extends CI_Model
{	
	function __construct(){
        parent::__construct();
    }

	private $_table = "ref_artikel_berita_media";	

	public $artikel_berita_media_id;
	public $artikel_berita_media_media = "default.png";
	public $artikel_berita_media_artikel_berita_id;	

	//ambil data seluruh media berdasarkan id galeri
	public function getAll($id)
	{
		return $this->db->get_where($this->_table, ["artikel_berita_media_artikel_berita_id" => $id])->result();
		// return $this->db->get($this->_table)->result();
	}

	//ambil data media
	public function getById($id)
	{
		return $this->db->get_where($this->_table, ["artikel_berita_media_id" => $id])->row();
	}

	//save upload media_artikel_berita dan link
	public function save($id, $slug)
	{						 
    	$this->load->library('upload');			
		$files = $_FILES;
		$cpt = count($_FILES["media_artikel_berita"]["name"]);
		for ($i=0; $i < $cpt; $i++){
			if (!empty($_FILES["media_artikel_berita"]["name"][$i])) {
				$_FILES['media_artikel_berita']['name']= $files['media_artikel_berita']['name'][$i];
		        $_FILES['media_artikel_berita']['type']= $files['media_artikel_berita']['type'][$i];
		        $_FILES['media_artikel_berita']['tmp_name']= $files['media_artikel_berita']['tmp_name'][$i];
		        $_FILES['media_artikel_berita']['error']= $files['media_artikel_berita']['error'][$i];
		        $_FILES['media_artikel_berita']['size']= $files['media_artikel_berita']['size'][$i];

	            $file_ext = pathinfo($files["media_artikel_berita"]["name"][$i], PATHINFO_EXTENSION);
	            $file_name_upload = 'media_artikel_berita'.'-' . date('Y-m-d-H:i:s').'-'. $i;
	            $file_name = 'media_artikel_berita'.'-' . date('Y-m-d-H:i:s') .'-'. $i .'.' . $file_ext;
	            $data = array(
	                'media_artikel_berita' => $file_name
	            );	            
	            $this->upload->initialize($this->doUpload($file_name_upload));            
	            $this->upload->do_upload('media_artikel_berita');
	            // $dataInfo[] = $this->upload->data();

	        	$data1 = array(
					'artikel_berita_media_media'=>$file_name,
					'artikel_berita_media_artikel_berita_id'=>$id,
					'artikel_berita_media_artikel_berita_slug'=>$slug						
				);	  	    				  				   
				$this->db->insert($this->_table, $data1);	
	        } 	        
    	}	    		
	}
	
	//hapus data media
	public function delete($id)
	{
		$this->_deleteFile($id);
		return $this->db->delete($this->_table, array("artikel_berita_media_id" => $id));
	}

	//hapus seluruh media jika data galeri terhapus
	public function deleteAll($id)
	{
		$this->_deleteFileAll($id);
		return $this->db->delete($this->_table, array("artikel_berita_media_artikel_berita_id" => $id));
	}	

	//config upload
	private function doUpload($file_name)
	{
		$config['upload_path']		= './assets/upload/artikel_berita';
		$config['allowed_types']	= 'gif|jpg|png';
		$config['file_name']		= $file_name;
		$config['overwrite']		= true;
		$config['max_size']			= 0; //2MB
		//$config['max_width']		= 1024;
		//$config['max_height']		= 768;

		return $config;		

	}

	//hapus file satu satu
	private function _deleteFile($id)
	{
	    $artikel_media = $this->getById($id);
	    if ($artikel_media->artikel_berita_media_media != "default.pdf") {
		    $filename = explode(".", $artikel_media->artikel_berita_media_media)[0];
			return array_map('unlink', glob(FCPATH."./assets/upload/artikel_berita/$filename.*"));
	    }
	}

	//hapus file keseluruhan berdasarkan id galeri
	private function _deleteFileAll($id)
	{
	    $artikel_media = $this->getAll($id);
	    foreach ($artikel_media as $data) {
	    	if ($data->artikel_berita_media_media != "default.pdf") {
		    	$filename = explode(".", $data->artikel_berita_media_media)[0];
				array_map('unlink', glob(FCPATH."./assets/upload/artikel_berita/$filename.*"));
	    	}
	    }
	    
	}
	
}