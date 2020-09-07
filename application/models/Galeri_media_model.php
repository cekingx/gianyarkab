<?php defined('BASEPATH') OR exit('No direct script access allowed');

class galeri_media_model extends CI_Model
{	
	function __construct(){
        parent::__construct();
    }

	private $_table = "ref_galeri_media";	

	public $galeri_media_id;
	public $galeri_media_media = "default.png";
	public $galeri_media_galeri_id;	
	public $galeri_media_jenis;		

	//ambil data seluruh media berdasarkan id galeri
	public function getAll($id)
	{
		return $this->db->get_where($this->_table, ["galeri_media_galeri_id" => $id])->result();
		// return $this->db->get($this->_table)->result();
	}

	//ambil data media
	public function getById($id)
	{
		return $this->db->get_where($this->_table, ["galeri_media_id" => $id])->row();
	}

	//save upload foto_galeri dan link
	public function save($id)
	{						 
    	$this->load->library('upload');			
		$files = $_FILES;
		$cpt = count($_FILES["foto_galeri"]["name"]);
		for ($i=0; $i < $cpt; $i++){
			if (!empty($_FILES["foto_galeri"]["name"][$i])) {
				$_FILES['foto_galeri']['name']= $files['foto_galeri']['name'][$i];
		        $_FILES['foto_galeri']['type']= $files['foto_galeri']['type'][$i];
		        $_FILES['foto_galeri']['tmp_name']= $files['foto_galeri']['tmp_name'][$i];
		        $_FILES['foto_galeri']['error']= $files['foto_galeri']['error'][$i];
		        $_FILES['foto_galeri']['size']= $files['foto_galeri']['size'][$i];

	            $file_ext = pathinfo($files["foto_galeri"]["name"][$i], PATHINFO_EXTENSION);
	            $file_name_upload = 'foto_galeri'.'-' . date('Y-m-d-H:i:s').'-'. $i;
	            $file_name = 'foto_galeri'.'-' . date('Y-m-d-H:i:s') .'-'. $i .'.' . $file_ext;
	            $data = array(
	                'foto_galeri' => $file_name
	            );	            
	            $this->upload->initialize($this->doUpload($file_name_upload));            
	            $this->upload->do_upload('foto_galeri');
	            // $dataInfo[] = $this->upload->data();

	        	$data1 = array(
					'galeri_media_media'=>$file_name,
					'galeri_media_galeri_id'=>$id,
					'galeri_media_jenis'=> 0
				);	  	    				  				   
				$this->db->insert($this->_table, $data1);	
	        } else {	        	
	        	$post = $this->input->post();		
				$this->galeri_media_media = $post["video_galeri"];
				$this->galeri_media_galeri_id = $id;
				$this->galeri_media_jenis = 1;
		    	$this->db->insert($this->_table, $this);	 	    		
	        }
	        
    	}	    	
    	
	}
	
	//hapus data media
	public function delete($id)
	{
		$this->_deleteFile($id);
		return $this->db->delete($this->_table, array("galeri_media_id" => $id));
	}

	//hapus seluruh media jika data galeri terhapus
	public function deleteAll($id)
	{
		$this->_deleteFileAll($id);
		return $this->db->delete($this->_table, array("galeri_media_galeri_id" => $id));
	}	

	//config upload
	private function doUpload($file_name)
	{
		$config['upload_path']		= './assets/upload/galeri_foto';
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
	    $galeri_media = $this->getById($id);
	    if ($galeri_media->galeri_media_media != "default.pdf") {
		    $filename = explode(".", $galeri_media->galeri_media_media)[0];
			return array_map('unlink', glob(FCPATH."./assets/upload/galeri_foto/$filename.*"));
	    }
	}

	//hapus file keseluruhan berdasarkan id galeri
	private function _deleteFileAll($id)
	{
	    $galeri_media = $this->getAll($id);
	    foreach($galeri_media as $data){
	    	if ($data->galeri_media_media != "default.pdf") {
		    	$filename = explode(".", $data->galeri_media_media)[0];
				array_map('unlink', glob(FCPATH."./assets/upload/galeri_foto/$filename.*"));
	    	}
	    }	    	    		   	  
	}
	
}