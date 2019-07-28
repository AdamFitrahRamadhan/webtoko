<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kategori extends CI_Model {

	public function tampil_kat()
		{
			$tm_kategori=$this->db
							  ->get('kategori')->result();
			return $tm_kategori;
		}	

}

/* End of file m_kategori.php */
/* Location: ./application/models/m_kategori.php */