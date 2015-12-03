<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 */
class Page extends CI_Controller
{
  public function index()
  {
    $this->m_peminjaman->cek_keterlambatan();
    $this->m_riwayat_inaktif->status_check();
    $this->m_riwayat_retensi->status_check();
    $this->m_security->check();
    $data['judul'] = 'Beranda';
    $data['konten'] = 'pages/beranda';
    $this->load->view('index', $data);
  }

  public function master()
  {
    $this->m_security->check();
    $data['judul'] = 'Data Master';
    $data['konten'] = 'pages/master';
    $this->load->view('index', $data);
  }

  public function surat()
  {
    $this->m_security->check();
    $data['judul'] = 'Surat';
    $data['konten'] = 'pages/surat';
    $this->load->view('index', $data);
  }

  public function pengguna()
  {
    $this->m_security->check();
    $data['judul'] = 'Atur Pengguna';
    $data['konten'] = 'pages/pengguna';
    $data['pengguna'] = $this->m_pengguna->get_all();
    $this->load->view('index', $data);
  }
}

?>
