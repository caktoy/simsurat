<?php
/**
 *
 */
class Peminjaman extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    $this->m_security->check();
    $data['judul'] = "Peminjaman Arsip";
    $data['konten'] = "pages/surat/peminjaman";

    $data['surat'] = $this->m_surat->get_all();
    $data['pegawai'] = $this->m_pegawai->get_all();
    $data['tanggal_kembali'] = date("d-m-Y", strtotime(date("d-m-Y").'4 days'));

    $this->load->view('index', $data);
  }

  public function pinjam()
  {
    $this->m_security->check();
    $nip = $this->input->post("nip");
    $selected_arsip = $this->input->post("ck-arsip");
    $keperluan = $this->input->post("ket");
    $tanggal_pinjam = date("Y-m-d");
    $tanggal_kembali =  date("Y-m-d", strtotime($this->input->post("kembali")));
    $lama_pinjam = date_diff(date_create($tanggal_kembali), date_create($tanggal_pinjam))->format("%a");
    $status_pinjam = "menunggu";

    $aff_rows = 0;
    foreach ($selected_arsip as $id_surat) {
      // insert into peminjaman
      $input_value = array(
        "id" => $this->m_security->gen_ai_id("peminjaman", "id"),
        "nip" => $nip,
        "id_surat" => $id_surat,
        "keperluan" => $keperluan,
        "tanggal_pinjam" => $tanggal_pinjam,
        "tanggal_kembali" => $tanggal_kembali,
        "lama_pinjam" => $lama_pinjam,
        "status_pinjam" => $status_pinjam
      );
      $aff_rows += $this->m_peminjaman->arr_create($input_value);
    }

    if ($aff_rows > 0) {
      $this->session->set_flashdata('pesan', '<b>Berhasil!</b> Peminjaman arsip telah disimpan.');
    } else {
      $this->session->set_flashdata('pesan', '<b>Gagal!</b> Peminjaman arsip gagal disimpan.');
    }
    redirect('/peminjaman');
  }

  public function konfirmasi()
  {
    $this->m_peminjaman->cek_keterlambatan();
    $this->m_security->check();
    $data["judul"] = "Konfirmasi Peminjaman";
    $data["konten"] = "pages/surat/peminjaman_konfirmasi";

    $data['pinjam'] = $this->m_peminjaman->get_all();

    $this->load->view("index", $data);
  }

  public function confirm($id)
  {
    $this->m_security->check();
    $act = $this->m_peminjaman->update_status($id, "pinjam");
    $pesan = $act>0?
      "<strong>Berhasil!</strong> Peminjaman arsip telah dikonfirmasi.":
      "<strong>Gagal!</strong> Peminjaman arsip gagal dikonfirmasi.";
    $this->session->set_flashdata("pesan", $pesan);
    redirect("/peminjaman/konfirmasi");
  }

  public function back($id)
  {
    $this->m_security->check();
    $act = $this->m_peminjaman->update_status($id, "kembali");
    $pesan = $act>0?
      "<strong>Berhasil!</strong> Arsip telah dikembalikan.":
      "<strong>Gagal!</strong> Arsip gagal dikembalikan.";
    $this->session->set_flashdata("pesan", $pesan);
    redirect("/peminjaman/konfirmasi");
  }

  public function notify($id)
  {
    $this->m_security->check();
    redirect("/peminjaman/konfirmasi");
  }

  public function riwayat()
  {
    $this->m_peminjaman->cek_keterlambatan();
    $this->m_security->check();
    $data["judul"] = "Riwayat Peminjaman";
    $data["konten"] = "pages/surat/peminjaman_riwayat";

    $data['pinjam'] = $this->m_peminjaman->get_pegawai($this->session->userdata("nip"));

    $this->load->view("index", $data);
  }
}

?>
