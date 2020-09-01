<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$data['content'] = 'admin/pengumuman/index';
		$this->load->view('admin/index', $data);
	}

	public function data()
	{
		$data = [
			[
				'pengumuman_id' => 1,
				'pengumuman_judul' => 'Lelang',
				'pengumuman_isi' => 'Lelang mobil'
			],
			[
				'pengumuman_id' => 2,
				'pengumuman_judul' => 'Lelang',
				'pengumuman_isi' => 'Lelang mobil'
			],
			[
				'pengumuman_id' => 3,
				'pengumuman_judul' => 'Lelang',
				'pengumuman_isi' => 'Lelang mobil'
			],
		];

		echo json_encode($data);
	}

	public function dashboard()
	{
		$data['content'] = 'dashboard/index';
		$this->load->view('layouts/master', $data);
	}

	public function create()
	{
		$data['content'] = 'admin/pengumuman/create';
		$this->load->view('admin/index', $data);
	}
}
