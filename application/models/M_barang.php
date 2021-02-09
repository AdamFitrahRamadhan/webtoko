<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_barang extends CI_Model{

    public function getDataBarang()
  {
    return $this->db->get('barang')->result();
  }
  public function simpan_barang()
  {
    $object = array(
      'nama_barang' => $this->input->post('nama_barang') ,
      'harga_jual' => $this->input->post('harga_jual') ,
      'harga_beli' => $this->input->post('harga_beli') ,
      'stok' => $this->input->post('stok') ,
      'kategori' => $this->input->post('kategori') ,
    );
    return $this->db->insert('barang', $object);
  }
  public function hapus($kode_barang)
  {
    return $this->db->where('kode_barang', $kode_barang)->delete('barang');
  }
  public function edit_barang()
  {
    $object = array(
      'nama_barang' => $this->input->post('nama_barang') ,
      'harga_jual' => $this->input->post('harga_jual') ,
      'harga_beli' => $this->input->post('harga_beli') ,
      'stok' => $this->input->post('stok') ,
      'kategori' => $this->input->post('kategori') ,
    );
    return $this->db->where('kode_barang', $this->input->post('kode_barang'))->update('barang', $object);
  }
  public function detail($a)
  {
    return $this->db->where('kode_barang', $a)->get('barang')->row();
  }

}
