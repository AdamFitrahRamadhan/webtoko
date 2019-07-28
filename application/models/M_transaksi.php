<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_transaksi extends CI_Model{
  public function menyimpan()
  {
      $object = array (
        'nama_pembeli' => $this->input->post('nama_pembeli'),
        'tgl_beli' => date('Y-m-d'),
        'total' => $this->input->post('total')
      );
      $this->db->insert('transaksi', $object);
      $tm_transaksi = $this->db->order_by('kode_transaksi', 'desc')
                          ->limit(1)
                          ->get('transaksi')
                          ->row();
      $hasil = array();
      for ($i=0 ; $i < count($this->input->post('kode_buku')) ; $i++ ) {
          $hasil[] = array(
              'kode_transaksi' => $tm_transaksi->kode_transaksi,
              'kode_buku' => $this->input->post('kode_buku')[$i],
              'jumlah' => $this->input->post('qty')[$i]
          );
      }
      $proses =  $this->db->insert_batch('nota', $hasil);
      if ($proses) {
          return $tm_transaksi->kode_transaksi;
      }
      else {
        return 0;
      }
  }

    public function get_total($id)
    {
      return $this->db->where('kode_transaksi', $id)
                      ->get('transaksi')
                      ->row();
    }

    public function get_nota($id)
    {
      return $this->db->join('buku', 'buku.kode_buku = nota.kode_buku')
                      ->join('kategori', 'kategori.kode_kategori = buku.kode_kategori')
                      ->where('kode_transaksi', $id)
                      ->get('nota')
                      ->result();
    }
    public function tm_pesan()
    {
      $tampilkan = $this->db->order_by('kode_transaksi', 'desc')
                            ->get('transaksi')->result();
      return $tampilkan;
    }

}
