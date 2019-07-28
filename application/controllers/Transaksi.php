<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('m_transaksi', 'transaksi');
    $this->load->model('m_buku', 'buku');
  }

  public function index()
  {
      $data['konten'] = "transaksi";
      $data['judul'] = "Togamedia | Transaksi";
      $data['buku'] = $this->buku->menampilkan();
      $data['kategori'] = $this->buku->sikategori();
      $this->load->view('template', $data);
  }

  public function tambah($id)
  {
      $detail=$this->buku->detail($id);
      $data = array(
        'id'      => $detail->kode_buku,
        'qty'     => 1,
        'price'   => $detail->harga,
        'name'    => $detail->judul_buku,
        'options' => array('Genre' => $detail->nama_kategori)
      );
      $this->cart->insert($data);
      redirect('transaksi');
  }

  public function hapus_item($id)
  {
    $data = array(
      'rowid'      => $id,
      'qty'     => 0
    );
    $this->cart->update($data);
    redirect('transaksi');
  }

  public function simpan()
  {
    if ($this->input->post('simpan')) {
        $kode_transaksi = $this->transaksi->menyimpan();
        if ($kode_transaksi > 0) {
            $this->cart->destroy();
            redirect('transaksi/pembayaran/'.$kode_transaksi, 'refresh');
        }
        else {
            redirect('cart');
        }
    }
  }

  public function pembayaran($id)
  {
      $data['nota']=$this->transaksi->get_total($id);
      $data['judul'] = "Togamedia | Pembayaran";
      $this->load->view('pembayaran', $data, FALSE);
  }

  public function pesanan()
  {
      $data['konten'] = "pesanan";
      $data['judul'] = "Togamedia | Daftar Pesanan";
      $data['pesanan'] = $this->transaksi->tm_pesan();
      $this->load->view('template', $data);
  }

}
