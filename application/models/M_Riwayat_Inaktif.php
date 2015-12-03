<?php
/**
 *
 */
class M_Riwayat_Inaktif extends CI_Model
{

  function __construct()
  {
    parent::__construct();
  }

  public function create($id, $surat, $inaktif, $tanggal1, $tanggal2, $status)
  {
    return $this->db->insert(
      'riwayat_inaktif',
      array(
        'id' => $id,
        'id_surat' => $surat,
        'id_inaktif' => $inaktif,
        'tanggal_inaktif' => $tanggal1,
        'tanggal_aktif_kembali' => $tanggal2,
        'status' => $status
      )
    );
  }

  public function update($id, $surat, $inaktif, $tanggal1, $tanggal2, $status)
  {
    $this->db->where('id', $id);
    return $this->db->update(
      'riwayat_inaktif',
      array(
        'id_surat' => $surat,
        'id_inaktif' => $inaktif,
        'tanggal_inaktif' => $tanggal1,
        'tanggal_aktif_kembali' => $tanggal2,
        'status' => $status
      )
    );
  }

  public function update_surat($surat, $inaktif, $tanggal1, $tanggal2, $status)
  {
    $this->db->where('id_surat', $surat);
    return $this->db->update(
      'riwayat_inaktif',
      array(
        'id_inaktif' => $inaktif,
        'tanggal_inaktif' => $tanggal1,
        'tanggal_aktif_kembali' => $tanggal2,
        'status' => $status
      )
    );
  }

  public function status_check()
  {
    // lihat tanggal sekarang dari sistem
    $tgl_sekarang = date_create(date("Y-m-d"));
    // ambil data dari tabel riwayat inaktif
    $riwayat_inaktif = $this->get_all();
    // lakukan pembacaan setiap data dari data yang diambil
    foreach ($riwayat_inaktif as $ri) {
      $id = $ri->ID;
      $tgl_inaktif = date_create(date("Y-m-d", strtotime($ri->TANGGAL_INAKTIF)));
      $tgl_aktif_kembali = date_create(date("Y-m-d", strtotime($ri->TANGGAL_AKTIF_KEMBALI)));
      // hitung selisih antara tanggal sekarang dan tanggal inaktif
      $diff1 = date_diff($tgl_sekarang, $tgl_inaktif);
      // hitung selisih antara tanggal sekarang dan tanggal aktif kembali
      $diff2 = date_diff($tgl_sekarang, $tgl_inaktif);
      // cek apakah sudah diaktifkan kembali atau tidak
      if (!empty($ri->TANGGAL_AKTIF_KEMBALI) || $ri->TANGGAL_AKTIF_KEMBALI != '0000-00-00') {
        // update data jika nilai selisih tanggal negatif
        if ((int) $diff1->format("%R%a") < 0) {
          $this->db->where("id", $id);
          $this->db->update("riwayat_inaktif", array("status" => 1));
        }
      } else {
        // update data jika nilai selisih tanggal negatif
        if ((int) $diff2->format("%R%a") < 0) {
          $this->db->where("id", $id);
          $this->db->update("riwayat_inaktif", array("status" => 1));
        }
      }
      // end if
    }
    // end foreach
  }

  public function change_status($id_surat, $status)
  {
    $this->db->where('id_surat', $id_surat);
    return $this->db->update('riwayat_inaktif', array('status' => $status));
  }

  public function reactivate($id)
  {
    $this->db->where('id', $id);
    $this->db->update(
      'riwayat_inaktif',
      array(
        //'tanggal_inaktif' => date("Y-m-d"),
        'tanggal_aktif_kembali' => date("Y-m-d"),
        'status' => 0
      )
    );
  }

  public function get_all()
  {
    return $this->db->get('riwayat_inaktif')->result();
  }

  public function get_id($id)
  {
    return $this->db->get_where('riwayat_inaktif', array('id' => $id))->result();
  }

  public function get_surat($surat)
  {
    return $this->db->get_where('riwayat_inaktif', array('id_surat' => $surat))->result();
  }

  public function delete($id)
  {
    $this->db->where('id', $id);
    return $this->db->delete('riwayat_inaktif');
  }

  public function delete_surat($surat)
  {
    $this->db->where('id_surat', $surat);
    return $this->db->delete('riwayat_inaktif');
  }

  public function get_status($status)
  {
    $this->db->select("surat.*, jenis_surat.NAMA as JENIS, lokasi.NAMA as LOKASI, riwayat_inaktif.*");
    $this->db->from("surat");
    $this->db->join("riwayat_inaktif", "surat.id_surat = riwayat_inaktif.id_surat");
    $this->db->join("lokasi", "surat.id_lokasi = lokasi.id_lokasi", "left");
    $this->db->join("jenis_surat", "surat.id_jenis = jenis_surat.id_jenis", "left");
    $this->db->where("riwayat_inaktif.status", $status);
    return $this->db->get()->result();
  }
}

?>
