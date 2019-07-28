<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_kategori','kat');
	}

	public function index()
	{
		$data['tampil_kategori']=$this->kat->tampil_kat();
		$data['konten']="v_kategori";
		$this->load->view('template', $data);
	}

}

/* End of file kategori.php */
/* Location: ./application/controllers/kategori.php */