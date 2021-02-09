<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('m_transaksi', 'transaksi');
    $this->load->model('m_barang', 'barang');
  }

  public function index()
  {
      $data['konten'] = "transaksi";
      $data['judul'] = "Toko | Transaksi";
      $data['tampil_barang']=$this->barang->getDataBarang();
      $this->load->view('template', $data);
  }

  public function tambah($id)
  {
      $detail=$this->barang->detail($id);
      $data = array(
        'id'      => $detail->kode_barang,
        'qty'     => 1,
        'price'   => $detail->harga_beli,
        'name'    => $detail->nama_barang,
        'options' => array('Genre' => $detail->kategori)
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
        $kode_penjualan = $this->transaksi->menyimpan();
        if ($kode_penjualan > 0) {
            $this->cart->destroy();
            redirect('transaksi/pembayaran/'.$kode_penjualan, 'refresh');
        }
        else {
            redirect('cart');
        }
    }
  }

  public function pembayaran($id)
  {
      $data['nota']=$this->transaksi->get_total($id);
      $data['judul'] = "Toko | Pembayaran";
      $this->load->view('pembayaran', $data, FALSE);
  }

  public function pesanan()
  {
      $data['konten'] = "pesanan";
      $data['judul'] = "Toko | Daftar Pesanan";
      $data['pesanan'] = $this->transaksi->tm_pesan();
      $this->load->view('template', $data);
  }

}
