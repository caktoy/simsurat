<?php
/**
 *
 */
class Disposisi extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    $this->m_security->check();
    $data["judul"] = "Disposisi Arsip";
    $data["konten"] = "pages/surat/disposisi_list";

    $data["surat"] = $this->m_disposisi->get_unprocessed($this->session->userdata("nip"));

    return $this->load->view("index", $data);
  }

  public function riwayat()
  {
    $this->m_security->check();
    $data["judul"] = "Riwayat Disposisi";
    $data["konten"] = "pages/surat/disposisi_riwayat";

    $data["surat"] = $this->m_disposisi->get_unprocessed($this->session->userdata("nip"));

    return $this->load->view("index", $data);
  }

  public function cari_riwayat()
  {
    $this->m_security->check();
    $surat = $this->input->post("surat");

    $data["surat"] = $this->m_disposisi->get_where(array("disposisi.id" => $surat));

    return $this->load->view("pages/surat/disposisi_cari", $data);
  }

  public function bag_umum($id)
  {
    $this->m_security->check();
    $data['judul'] = "Disposisi Surat Sub Bagian Umum";
    $data['konten'] = "pages/surat/disposisi_umum";

    $data['surat'] = $this->m_arsip_masuk->get_id($id);
    $data['unit'] = $this->m_unit->get_all();

    return $this->load->view("index", $data);
  }

  public function unit_kerja($id)
  {
    $this->m_security->check();
    $data['judul'] = "Disposisi Surat Unit Kerja";
    $data['konten'] = "pages/surat/disposisi_unit";

    $data['surat'] = $this->m_arsip_masuk->get_id($id);
    $data['unit'] = $this->m_unit->get_all();

    return $this->load->view("index", $data);
  }
}

?>
