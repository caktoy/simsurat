<?php
/**
 *
 */
class M_Arsip_Masuk extends CI_Model
{

  function __construct()
  {
    parent::__construct();
  }

  public function create($id, $nip, $surat, $tanggal, $keterangan)
  {
    return $this->db->insert(
      'arsip_masuk',
      array(
        'id' => $id,
        'nip' => $nip,
        'id_surat' => $surat,
        'tanggal' => $tanggal,
        'keterangan' => $keterangan
      )
    );
  }

  public function get_all()
  {
    $this->db->select("surat.*, lokasi.nama as LOKASI, jenis_surat.nama as JENIS");
    $this->db->from("surat");
    $this->db->join("arsip_masuk", "surat.id_surat = arsip_masuk.id_surat");
    $this->db->join("lokasi", "surat.id_lokasi = lokasi.id_lokasi");
    $this->db->join("jenis_surat", "surat.id_jenis = jenis_surat.id_jenis");
    $this->db->join("media", "surat.id_media = media.id_media");
    return $this->db->get()->result();
  }

  public function get_id($id)
  {
    $this->db->select("surat.*, lokasi.nama as LOKASI, jenis_surat.nama as JENIS, arsip_masuk.KETERANGAN");
    $this->db->from("surat");
    $this->db->join("arsip_masuk", "surat.id_surat = arsip_masuk.id_surat");
    $this->db->join("lokasi", "surat.id_lokasi = lokasi.id_lokasi");
    $this->db->join("jenis_surat", "surat.id_jenis = jenis_surat.id_jenis");
    $this->db->join("media", "surat.id_media = media.id_media");
    $this->db->where('surat.id_surat', $id);
    return $this->db->get()->result();
  }

  public function get_custom(array $condition = array())
  {
    $this->db->select("surat.*, lokasi.nama as LOKASI, jenis_surat.nama as JENIS, arsip_masuk.NIP as NIP, arsip_masuk.KETERANGAN");
    $this->db->from("surat");
    $this->db->join("arsip_masuk", "surat.id_surat = arsip_masuk.id_surat");
    $this->db->join("lokasi", "surat.id_lokasi = lokasi.id_lokasi");
    $this->db->join("jenis_surat", "surat.id_jenis = jenis_surat.id_jenis");
    $this->db->join("media", "surat.id_media = media.id_media");
    $this->db->where($condition);
    return $this->db->get()->result();
  }

  public function update($id, $nip, $surat, $tanggal, $keterangan)
  {
    $this->db->where('id', $id);
    return $this->db->update(
      'arsip_masuk',
      array(
        'nip' => $nip,
        'id_surat' => $surat,
        'tanggal' => $tanggal,
        'keterangan' => $keterangan
      )
    );
  }

  public function update_surat($nip, $surat, $tanggal, $keterangan)
  {
    $this->db->where('id_surat', $surat);
    return $this->db->update(
      'arsip_masuk',
      array(
        'nip' => $nip,
        'tanggal' => $tanggal,
        'keterangan' => $keterangan
      )
    );
  }

  public function delete($id)
  {
    $this->db->where('id', $id);
    return $this->db->delete('arsip_masuk');
  }

  public function delete_surat($surat)
  {
    $this->db->where('id_surat', $surat);
    return $this->db->delete('arsip_masuk');
  }
}

?>
