<?php
/**
 *
 */
class M_Riwayat_Retensi extends CI_Model
{

  function __construct()
  {
    parent::__construct();
  }

  public function create($id, $surat, $retensi, $tanggal, $status)
  {
    return $this->db->insert(
      'riwayat_retensi',
      array(
        'id' => $id,
        'id_surat' => $surat,
        'id_jadwal' => $retensi,
        'tanggal_retensi' => $tanggal,
        'status' => $status
      )
    );
  }

  public function update($id, $surat, $retensi, $tanggal, $status)
  {
    $this->db->where('id', $id);
    return $this->db->update(
      'riwayat_retensi',
      array(
        'id_surat' => $surat,
        'id_jadwal' => $retensi,
        'tanggal_retensi' => $tanggal,
        'status' => $status
      )
    );
  }

  public function update_surat($surat, $retensi, $tanggal, $status)
  {
    $this->db->where('id_surat', $surat);
    return $this->db->update(
      'riwayat_retensi',
      array(
        'id_jadwal' => $retensi,
        'tanggal_retensi' => $tanggal,
        'status' => $status
      )
    );
  }

  public function status_check()
  {
    // lihat tanggal sekarang dari sistem
    $tgl_sekarang = date_create(date("Y-m-d"));
    // ambil data dari tabel riwayat retensi
    $riwayat_retensi = $this->get_all();
    // lakukan pembacaan setiap data dari data yang diambil
    foreach ($riwayat_retensi as $rr) {
      $id = $rr->ID;
      $tgl_retensi = date_create(date("Y-m-d", strtotime($rr->TANGGAL_RETENSI)));
      // hitung selisih antara tanggal sekarang dan tanggal retensi
      $diff = date_diff($tgl_sekarang, $tgl_retensi);
      // update data jika nilai selisih tanggal negatif
      if ((int) $diff->format("%R%a") < 0) {
        $this->db->where("id", $id);
        $this->db->update("riwayat_retensi", array("status" => 1));
      }
    }
  }

  public function get_all()
  {
    return $this->db->get('riwayat_retensi')->result();
  }

  public function get_id($id)
  {
    return $this->db->get_where('riwayat_retensi', array('id' => $id))->result();
  }

  public function get_surat($surat)
  {
    return $this->db->get_where('riwayat_retensi', array('id_surat' => $surat))->result();
  }

  public function delete($id)
  {
    $this->db->where('id', $id);
    return $this->db->delete('riwayat_retensi');
  }

  public function delete_surat($surat)
  {
    $this->db->where('id_surat', $surat);
    return $this->db->delete('riwayat_retensi');
  }

  public function get_status($status)
  {
    $this->db->select("surat.*, jenis_surat.NAMA as JENIS, lokasi.NAMA as LOKASI, riwayat_retensi.*");
    $this->db->from("surat");
    $this->db->join("riwayat_retensi", "surat.id_surat = riwayat_retensi.id_surat");
    $this->db->join("lokasi", "surat.id_lokasi = lokasi.id_lokasi", "left");
    $this->db->join("jenis_surat", "surat.id_jenis = jenis_surat.id_jenis", "left");
    $this->db->where("riwayat_retensi.status", $status);
    return $this->db->get()->result();
  }
}

?>
