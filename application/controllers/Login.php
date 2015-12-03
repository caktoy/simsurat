<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 */
class Login extends CI_Controller
{
  public function index()
  {
    $this->m_peminjaman->cek_keterlambatan();
    $this->m_riwayat_inaktif->status_check();
    $this->m_riwayat_retensi->status_check();
    $this->load->view('login');
  }

  public function auth()
  {
    $nip = $this->input->post('nip');
    $pass = $this->input->post('pass');

    $query = $this->m_pengguna->auth($nip, $pass);

    if (count($query) > 0) {
      $pengguna = $this->m_pengguna->get_pengguna($query[0]->ID_PENGGUNA);
      $session_data = array(
        'id_pengguna' => $pengguna[0]->ID_PENGGUNA,
        'nip' => $pengguna[0]->NIP,
        'nama' => $pengguna[0]->NAMA,
        'email' => $pengguna[0]->EMAIL,
        'role' => $pengguna[0]->PREVILAGE,
      );
      $this->session->set_userdata($session_data);
      redirect('/page');
    } else {
      $this->session->set_flashdata('pesan', '<strong>Gagal!</strong> Mohon periksa NIP dan Password yang Anda masukkan.');
      redirect('/login');
    }
  }

  public function keluar()
  {
    $this->session->sess_destroy();
    redirect('/login');
  }
}

?>
