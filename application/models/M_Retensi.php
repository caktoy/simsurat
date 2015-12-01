<?php
/**
 *
 */
class M_Retensi extends CI_Model
{

  function __construct()
  {
    parent::__construct();
  }

  public function create($id, $jenis, $masa)
  {
    return $this->db->insert(
      'jadwal_retensi',
      array('id_jadwal' => $id, 'id_jenis' => $jenis, 'masa_retensi' => $masa)
    );
  }

  public function get_all()
  {
    $this->db->select("jadwal_retensi.*, jenis_surat.NAMA as JENIS");
    $this->db->from("jadwal_retensi");
    $this->db->join("jenis_surat", "jadwal_retensi.id_jenis = jenis_surat.id_jenis");
    return $this->db->get()->result();
  }

  public function get_id($id)
  {
    $this->db->select("jadwal_retensi.*, jenis_surat.NAMA as JENIS");
    $this->db->from("jadwal_retensi");
    $this->db->join("jenis_surat", "jadwal_retensi.id_jenis = jenis_surat.id_jenis");
    $this->db->where('id_jadwal', $id);
    return $this->db->get()->result();
  }

  public function get_jenis($jenis)
  {
    $this->db->select("jadwal_retensi.*, jenis_surat.NAMA as JENIS");
    $this->db->from("jadwal_retensi");
    $this->db->join("jenis_surat", "jadwal_retensi.id_jenis = jenis_surat.id_jenis");
    $this->db->where('jadwal_retensi.id_jenis', $jenis);
    $this->db->limit(1);
    return $this->db->get()->result();
  }

  public function update($id, $jenis, $masa)
  {
    $this->db->where('id_jadwal', $id);
    return $this->db->update(
      'jadwal_retensi',
      array('id_jenis' => $jenis, 'masa_retensi' => $masa)
    );
  }

  public function delete($id)
  {
    $this->db->where('id_jadwal', $id);
    return $this->db->delete('jadwal_retensi');
  }
}

?>
