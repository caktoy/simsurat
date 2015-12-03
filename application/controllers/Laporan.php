<?php
/**
 *
 */
class Laporan extends CI_Controller
{

  public function index()
  {
    $data['judul'] = 'Laporan';
    $data['konten'] = 'pages/laporan';

    $this->load->view('index', $data);
  }

  public function template()
  {
    $this->load->library('pdfgenerator');
    $data['judul'] = 'Template';
    $data['pegawai'] = $this->m_pegawai->get_all();
    $html = $this->load->view('pages/pegawai', $data, true);

    $this->pdfgenerator->generate($html, 'coba_pdf');
  }

  public function filter()
  {
    $laporan = $this->input->post('laporan');
    $tgl1 = date("Y-m-d", strtotime($this->input->post('tgl_1')));
    $tgl2 = date("Y-m-d", strtotime($this->input->post('tgl_2')));

    switch ($laporan) {
      case 1: $this->surat_masuk($tgl1, $tgl2); break;
      case 2: $this->surat_keluar($tgl1, $tgl2); break;
      case 3: $this->disposisi($tgl1, $tgl2); break;
      case 4: $this->peminjaman($tgl1, $tgl2); break;
      case 5: $this->inaktif($tgl1, $tgl2); break;
      case 6: $this->retensi($tgl1, $tgl2); break;
    }
  }

  protected function surat_masuk($tgl1, $tgl2)
  {
    $this->load->library('pdfgenerator');
    $data['judul'] = 'Laporan Surat Masuk';
    $data['subjudul'] = 'Periode: '.date("d-m-Y", $tgl1).' s/d '.date("d-m-Y", $tgl2);
    $data['arsip'] = $this->m_arsip_masuk->get_all();
    $html = $this->load->view('report/pdf_template', $data, true);

    $this->pdfgenerator->generate($html, 'surat_masuk_'.date("d_m_Y"));
  }

  protected function surat_keluar($tgl1, $tgl2)
  {
    $this->load->library('pdfgenerator');
    $data['judul'] = 'Laporan Surat Keluar';
    $data['subjudul'] = 'Periode: '.date("d-m-Y", $tgl1).' s/d '.date("d-m-Y", $tgl2);
    $data['arsip'] = $this->m_arsip_keluar->get_all();
    $html = $this->load->view('report/pdf_template', $data, true);

    $this->pdfgenerator->generate($html, 'surat_keluar_'.date("d_m_Y"));
  }

  protected function disposisi($tgl1, $tgl2)
  {
    $this->load->library('pdfgenerator');
    $data['judul'] = 'Laporan Disposisi Arsip Surat';
    $data['subjudul'] = 'Periode: '.date("d-m-Y", $tgl1).' s/d '.date("d-m-Y", $tgl2);
    $data['arsip'] = $this->m_disposisi->get_all();
    $html = $this->load->view('report/pdf_template', $data, true);

    $this->pdfgenerator->generate($html, 'disposisi_surat_'.date("d_m_Y"));
  }

  protected function peminjaman($tgl1, $tgl2)
  {
    $this->load->library('pdfgenerator');
    $data['judul'] = 'Laporan Peminjaman Arsip Surat';
    $data['subjudul'] = 'Periode: '.date("d-m-Y", $tgl1).' s/d '.date("d-m-Y", $tgl2);
    $data['arsip'] = $this->m_peminjaman->get_all();
    $html = $this->load->view('report/pdf_template', $data, true);

    $this->pdfgenerator->generate($html, 'peminjaman_'.date("d_m_Y"));
  }

  protected function inaktif($tgl1, $tgl2)
  {
    $this->load->library('pdfgenerator');
    $data['judul'] = 'Laporan Peminjaman Arsip Surat';
    $data['subjudul'] = 'Periode: '.date("d-m-Y", $tgl1).' s/d '.date("d-m-Y", $tgl2);
    $data['arsip'] = $this->m_inaktif->get_all();
    $html = $this->load->view('report/pdf_template', $data, true);

    $this->pdfgenerator->generate($html, 'peminjaman_'.date("d_m_Y"));
  }

  protected function retensi($tgl1, $tgl2)
  {
    $this->load->library('pdfgenerator');
    $data['judul'] = 'Laporan Retensi Arsip';
    $data['subjudul'] = 'Periode: '.date("d-m-Y", $tgl1).' s/d '.date("d-m-Y", $tgl2);
    $data['arsip'] = $this->m_retensi->get_all();
    $html = $this->load->view('report/pdf_template', $data, true);

    $this->pdfgenerator->generate($html, 'retensi_'.date("d_m_Y"));
  }
}

?>
