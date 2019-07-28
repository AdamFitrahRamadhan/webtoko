<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kasir extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('m_kasir', 'kasir');
  }

  public function index()
  {
      $this->load->view('login');
  }

  public function register()
  {
      $this->load->view('register');
  }

public function simpan()
{
    if ($this->input->post('submit')) {
        $this->form_validation->set_rules('nama_kasir', 'Nama Kasir', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        $this->form_validation->set_rules('level', 'Level', 'trim|required');
        if ($this->form_validation->run() == true) {
            if ($this->kasir->masuk() == true) {
              $this->session->set_flashdata('pesan', 'Sukses Simpan');
              redirect('kasir', 'refresh');
            }
            else {
              $this->session->set_flashdata('pesan', 'Gagal Simpan');
              redirect('kasir/register', 'refresh');
            }
        }
        else {
            $this->session->set_flashdata('pesan', validation_errors());
            redirect('kasir/register', 'refresh');
        }
    }
}

  public function proses_login()
  {
    if ($this->input->post('login')) {
        $this->form_validation->set_rules('nama_kasir', 'Nama Kasir', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if ($this->form_validation->run() == TRUE) {
            if ($this->kasir->get_login()->num_rows()>0) {
                $data = $this->kasir->get_login()->row();
                $array = array(
                    'login'           => TRUE,
                    'nama_kasir'      => $data->nama_kasir,
                    'password'        => $data->password,
                    'level'           => $data->level,
                    'kode_kasir'      => $data->kode_kasir
                );
                $this->session->set_userdata($array);
                redirect('buku/dashboard', 'refresh');
            }
            else {
                $this->session->set_flashdata('pesan', 'Username dan Password Salah');
                redirect('kasir','refresh');
            }
        }
        else {
            $this->session->set_flashdata('pesan', validation_errors());
            redirect('kasir','refresh');
        }
    }
  }

  public function logout()
  {
      $this->session->sess_destroy();
      redirect('kasir', 'refresh');
  }

}
