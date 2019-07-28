<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kasir extends CI_Model{
    public function masuk()
    {
        $nama_kasir = $this->input->post('nama_kasir');
        $password = $this->input->post('password');
        $level = $this->input->post('level');

        $data_simpan = array('nama_kasir'=>$nama_kasir, 'password'=>$password, 'level'=>$level);
        $this->db->insert('kasir', $data_simpan);
        if ($this->db->affected_rows()>0) {
          return TRUE;
        }
        else {
          return FALSE;
        }
    }

    public function get_login()
    {
        return $this->db->where('nama_kasir', $this->input->post('nama_kasir'))
                        ->where('password', $this->input->post('password'))
                        ->get('kasir');
    }
}
