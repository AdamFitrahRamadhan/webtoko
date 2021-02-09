<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_transaksi extends CI_Model{
  public function menyimpan()
  {
      $object = array (
        'nama_konsumen' => $this->input->post('nama_konsumen'),
        // 'alamat' => $this->input->post('alamat'),
        'tgl_penjualan' => date('Y-m-d'),
      );
      $this->db->insert('penjualan', $object);
      $tm_penjualan = $this->db->order_by('kode_penjualan', 'desc')
                          ->limit(1)
                          ->get('penjualan')
                          ->row();
      $hasil = array();
      for ($i=0 ; $i < count($this->input->post('kode_barang')) ; $i++ ) {
          $hasil[] = array(
              'kode_penjualan' => $tm_penjualan->kode_penjualan,
              'kode_barang' => $this->input->post('kode_barang')[$i],
              'jumlah' => $this->input->post('qty')[$i]
          );
      }
      $proses =  $this->db->insert_batch('detail_penjualan', $hasil);
      if ($proses) {
          return $tm_penjualan->kode_penjualan;
      }
      else {
        return 0;
      }
  }

    public function get_total($id)
    {
      return $this->db->where('kode_penjualan', $id)
                      ->get('penjualan')
                      ->row();
    }

    public function get_nota($id)
    {
      return $this->db->join('buku', 'buku.kode_barang = nota.kode_barang')
                      ->where('kode_penjualan', $id)
                      ->get('nota')
                      ->result();
    }
    public function tm_pesan()
    {
      $tampilkan = $this->db->order_by('kode_penjualan', 'desc')
                            ->get('penjualan')->result();
      return $tampilkan;
    }

}
