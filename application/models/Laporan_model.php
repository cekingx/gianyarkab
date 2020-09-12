<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_model extends CI_Model
{	
	function __construct(){
        parent::__construct();
    }

	private $_table = "ta_laporan";	

	public $laporan_id;
	public $laporan_nama;
	public $laporan_jenis_laporan_id;
	public $laporan_file;	
	

	public function rules()
	{
		return [
			['field' => 'laporan_nama', 
			'label' => 'nama', 
			'rules' => 'required'],

			['field' => 'laporan_jenis',
			'label' => 'jenis',
			'rules' => 'required']
		];
	}

	public function getNumRows()
	{
		return $this->db->get($this->_table)->num_rows();
	}

	public function getAll()
	{
		$this->db->select('ta_laporan.*, ref_jenis_laporan.jenis_laporan_nama')
				->from('ref_jenis_laporan')
				->join('ta_laporan', 'ta_laporan.laporan_jenis_laporan_id = ref_jenis_laporan.jenis_laporan_id');
		return $this->db->get()->result();		
		// return $this->db->get($this->_table)->result();
	}

	public function getById($id)
	{
		$this->db->select('ta_laporan.*, ref_jenis_laporan.jenis_laporan_nama')
				->from('ref_jenis_laporan')
				->join('ta_laporan', 'ta_laporan.laporan_jenis_laporan_id = ref_jenis_laporan.jenis_laporan_id')
				->where('laporan_id', $id);
		return $this->db->get()->row();	
	}

	public function getLaporan($id)
	{
		$this->db->select('ta_laporan.*, ref_jenis_laporan.jenis_laporan_nama')
				->from('ref_jenis_laporan')
				->join('ta_laporan', 'ta_laporan.laporan_jenis_laporan_id = ref_jenis_laporan.jenis_laporan_id')
				->where('laporan_jenis_laporan_id', $id);
		return $this->db->get()->result();	
	}

	public function save()
	{
		// return print_r($this->upload_image());		

		$post = $this->input->post();		
		$this->laporan_nama = $post["laporan_nama"];
		$this->laporan_jenis_laporan_id = $post["laporan_jenis"];
		$this->laporan_file = $this->upload_file();
		$this->db->set('laporan_tanggal', 'NOW()', FALSE);		
		return $this->db->insert($this->_table, $this);
	}

	public function update()
	{
		$post = $this->input->post();
		$this->laporan_id = $post["id_laporan"];
		$this->laporan_nama = $post["laporan_nama"];
		$this->laporan_jenis_laporan_id = $post["laporan_jenis"];

		if (!empty($_FILES["file_laporan"]["name"])){
			$this->_deleteFile($post["id"]);			
			$this->laporan_file = $this->upload_file();
		} else {
			$this->laporan_file = $post["old_files"];
		}

		$this->laporan_tanggal = $post["tanggal"];
		return $this->db->update($this->_table, $this, array('laporan_id' => $post["id_laporan"]));
	}

	public function delete($id)
	{		
		$this->_deleteFile($id);
		return $this->db->delete($this->_table, array("laporan_id" => $id));
	}

	private function upload_file(){		
		if (!empty($_FILES["file_laporan"]["name"])) {

            $file_ext = pathinfo($_FILES["file_laporan"]["name"], PATHINFO_EXTENSION);
            $file_name_upload = 'file_laporan'.'-' . date('YmdHis');
            $file_name = 'file_laporan'.'-' . date('YmdHis') . '.' . $file_ext;
            $data = array(
                'file_laporan' => $file_name
            );            
            $this->doUpload('./assets/upload/laporan', 'file_laporan', $file_name_upload);
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
	    $laporan = $this->getById($id);
	    if ($laporan->laporan_file != "default.pdf") {
		    $filename = explode(".", $laporan->laporan_file)[0];
			return array_map('unlink', glob(FCPATH."./assets/upload/laporan/$filename.pdf"));
	    }
	}
	
}