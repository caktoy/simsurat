<?php
/**
 *
 */
class Retensi extends CI_Controller
{

  public function arsip_aktif()
  {
    $this->m_riwayat_inaktif->status_check();
    $this->m_riwayat_retensi->status_check();
    $this->m_security->check();

    $data['judul'] = 'Arsip Aktif';
    $data['konten'] = 'pages/surat/retensi_arsip_aktif';

    $data['surat'] = $this->m_riwayat_inaktif->get_status(0);

    $this->load->view('index', $data);
  }

  public function arsip_inaktif()
  {
    $this->m_riwayat_inaktif->status_check();
    $this->m_riwayat_retensi->status_check();
    $this->m_security->check();

    $data['judul'] = 'Arsip Inaktif';
    $data['konten'] = 'pages/surat/retensi_arsip_inaktif';

    $data['surat'] = $this->m_riwayat_inaktif->get_status(1);

    $this->load->view('index', $data);
  }

  public function retensi_arsip()
  {
    $this->m_riwayat_inaktif->status_check();
    $this->m_riwayat_retensi->status_check();
    $this->m_security->check();

    $data['judul'] = 'Retensi Arsip';
    $data['konten'] = 'pages/surat/retensi_arsip';

    $data['surat'] = $this->m_riwayat_retensi->get_status(1);

    $this->load->view('index', $data);
  }

  public function reactivate()
  {
    $id = $this->input->post('id');
    return $this->m_riwayat_inaktif->reactivate($id);
  }
}

?>
