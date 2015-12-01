<?php
/**
 *
 */
class M_Surat extends CI_Model
{

  function __construct()
  {
    parent::__construct();
  }

  public function create($id, $lokasi, $jenis, $media, $judul_kop, $nomor, $tanggal,
    $perihal, $dari, $kepada, $asal_instansi, $tanggal_masuk)
  {
    return $this->db->insert(
      'surat',
      array(
        'id_surat' => $id,
        'id_lokasi' => $lokasi,
        'id_jenis' => $jenis,
        'id_media' => $media,
        'judul_kop' => $judul_kop,
        'nomor' => $nomor,
        'tanggal' => $tanggal,
        'perihal' => $perihal,
        'dari' => $dari,
        'kepada' => $kepada,
        'asal_instansi' => $asal_instansi,
        'tanggal_masuk' => $tanggal_masuk
      )
    );
  }

  public function get_all()
  {
    $this->db->select("surat.*, lokasi.nama as LOKASI, jenis_surat.nama as JENIS");
    $this->db->from("surat");
    $this->db->join("lokasi", "surat.id_lokasi = lokasi.id_lokasi");
    $this->db->join("jenis_surat", "surat.id_jenis = jenis_surat.id_jenis");
    $this->db->join("media", "surat.id_media = media.id_media");
    return $this->db->get()->result();
  }

  public function get_id($id)
  {
    $this->db->select("surat.*, lokasi.nama as LOKASI, jenis_surat.nama as JENIS");
    $this->db->from("surat");
    $this->db->join("lokasi", "surat.id_lokasi = lokasi.id_lokasi");
    $this->db->join("jenis_surat", "surat.id_jenis = jenis_surat.id_jenis");
    $this->db->join("media", "surat.id_media = media.id_media");
    $this->db->where('id_surat', $id);
    return $this->db->get()->result();
  }

  public function get_custom(array $condition = array())
  {
    return $this->db->get_where("surat", $condition)->result();
  }

  public function update($id, $lokasi, $jenis, $media, $judul_kop, $nomor, $tanggal,
    $perihal, $dari, $kepada, $asal_instansi, $tanggal_masuk)
  {
    $this->db->where('id_surat', $id);
    return $this->db->update(
      'surat',
      array(
        'id_lokasi' => $lokasi,
        'id_jenis' => $jenis,
        'id_media' => $media,
        'judul_kop' => $judul_kop,
        'nomor' => $nomor,
        'tanggal' => $tanggal,
        'perihal' => $perihal,
        'dari' => $dari,
        'kepada' => $kepada,
        'asal_instansi' => $asal_instansi,
        'tanggal_masuk' => $tanggal_masuk
      )
    );
  }

  public function delete($id)
  {
    $this->db->where('id_surat', $id);
    return $this->db->delete('surat');
  }
}

?>
