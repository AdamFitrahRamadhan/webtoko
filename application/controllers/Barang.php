<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_barang','bar');
	}

	public function index()
	{
		$data['konten']='barang';
		$data['tampil_barang']=$this->bar->getDataBarang();
		$this->load->view('template', $data);
	}
	public function dashboard()
  	{
      $data['konten'] = "dashboard";
      $data['judul'] = "Tokok | Dashboard";
	  $data['tampil_barang']=$this->bar->getDataBarang();

      $this->load->view('template', $data);
  	}
	public function tambah_barang()
	{ 
		
		if ($this->bar->simpan_barang()) {
			$this->session->set_flashdata('pesan', 'sukses menambah');
			redirect('barang','refresh');
		} else {
			$this->session->set_flashdata('pesan', 'gagal menambah');
			redirect('barang','refresh');
		}
	}
	public function hapus($kode_barang)
	{
		if ($this->bar->hapus($kode_barang)) {
			$this->session->set_flashdata('pesan', 'Sukses Hapus Data');
		} else {
			$this->session->set_flashdata('pesan', 'barang tidak berhasi dihapus, gagal');
		}
		redirect('barang','refresh');
	}
	public function edit_barang($id)
	{
		$data=$this->bar->detail($id);
		echo json_encode($data);
	}
	public function ubah()
	{
		if ($this->bar->edit_barang()) {
			$this->session->set_flashdata('pesan', 'berhasil');
		}
		else{
			$this->session->set_flashdata('pesan', 'gagal');
		}
		redirect('barang','refresh');
	}

}
