<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('m_buku', 'buku');
  }

  public function index()
  {
      $data['konten'] = "buku";
      $data['buku'] = $this->buku->menampilkan();
      $data['kategori'] = $this->buku->sikategori();
      $data['nota']= $this->buku->siadmin();
      $data['judul'] = "Togamedia | Daftar Buku";
      $this->load->view('template', $data);
  }

  public function dashboard()
  {
      $data['konten'] = "dashboard";
      $data['judul'] = "Togamedia | Dashboard";
      $this->load->view('template', $data);
  }

  public function tambah()
  {
      if ($this->input->post('tambahdata')) {
          if ($this->buku->menambah() == true) {
              redirect('buku','refresh');
          }
          else {
              redirect('buku','refresh');
          }
      }
  }

  public function ubah()
  {
    if ($this->input->post('ubahdata')) {
      $kode_buku=$this->input->post('kode_buku');
      $judul_buku=$this->input->post('judul_buku');
      $tahun=$this->input->post('tahun');
      $kode_kategori=$this->input->post('kode_kategori');
      $harga=$this->input->post('harga');
      $penerbit=$this->input->post('penerbit');
      $penulis=$this->input->post('penulis');
      $stok=$this->input->post('stok');

      $this->buku->mengubah($kode_buku, $judul_buku, $tahun, $kode_kategori, $harga, $penerbit, $penulis, $stok);
      redirect('buku', 'refresh');
    }
  }

  public function hapus($kode_buku)
  {
      $this->buku->menghapus($kode_buku);
      redirect('buku', 'refresh');
  }

}
