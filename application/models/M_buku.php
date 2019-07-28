<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_buku extends CI_Model{

    public function menampilkan()
    {
      $tampilkan = $this->db->join('kategori', 'kategori.kode_kategori = buku.kode_kategori')->get('buku')->result();
      return $tampilkan;
    }

    public function menambah()
    {
      $kode_buku=$this->input->post('kode_buku');
      $judul_buku=$this->input->post('judul_buku');
      $tahun=$this->input->post('tahun');
      $kode_kategori=$this->input->post('kode_kategori');
      $harga=$this->input->post('harga');
      $penerbit=$this->input->post('penerbit');
      $penulis=$this->input->post('penulis');
      $stok=$this->input->post('stok');

      $data_simpan = array('kode_buku'=>$kode_buku, 'judul_buku'=>$judul_buku, 'tahun'=>$tahun, 'kode_kategori'=>$kode_kategori, 'harga'=>$harga,
                            'penerbit'=>$penerbit, 'penulis'=>$penulis, 'stok'=>$stok);
      $this->db->insert('buku', $data_simpan);
      if ($this->db->affected_rows()>0) {
          return TRUE;
      }
      else {
          return FALSE;
      }
    }

    public function mengubah($kode_buku, $judul_buku, $tahun, $kode_kategori, $harga, $penerbit, $penulis, $stok)
    {
      $hasil = $this->db->query("UPDATE buku SET kode_buku='$kode_buku', judul_buku='$judul_buku', tahun='$tahun', kode_kategori='$kode_kategori',
                                  harga='$harga', penerbit='$penerbit', penulis='$penulis', stok='$stok' WHERE kode_buku='$kode_buku'");
      return $hasil;
    }

    public function menghapus($kode_buku)
    {
      $hasil = $this->db->query("DELETE FROM buku where kode_buku='$kode_buku'");
      return $hasil;
    }

    public function detail($d)
    {
      $tm_buku= $this->db
                    ->join('kategori', 'kategori.kode_kategori = buku.kode_kategori')
                    ->where('kode_buku',$d)->get('buku')->row();
      return $tm_buku;
    }

    public function sikategori()
    {
      return $this->db->get('kategori')->result();
    }
    public function siadmin()
    {
      return $this->db->get('kasir')->result();
    }

}
