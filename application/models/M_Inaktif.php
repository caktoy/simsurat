<?php
/**
 *
 */
class M_Inaktif extends CI_Model
{

  function __construct()
  {
    parent::__construct();
  }

  public function create($id, $jenis, $masa)
  {
    return $this->db->insert(
      'inaktif',
      array('id_inaktif' => $id, 'id_jenis' => $jenis, 'masa_aktif' => $masa)
    );
  }

  public function get_all()
  {
    $this->db->select("inaktif.*, jenis_surat.NAMA as JENIS");
    $this->db->from("inaktif");
    $this->db->join("jenis_surat", "inaktif.id_jenis = jenis_surat.id_jenis");
    return $this->db->get()->result();
  }

  public function get_id($id)
  {
    $this->db->select("inaktif.*, jenis_surat.NAMA as JENIS");
    $this->db->from("inaktif");
    $this->db->join("jenis_surat", "inaktif.id_jenis = jenis_surat.id_jenis");
    $this->db->where('id_inaktif', $id);
    return $this->db->get()->result();
  }

  public function get_jenis($jenis)
  {
    $this->db->select("inaktif.*, jenis_surat.NAMA as JENIS");
    $this->db->from("inaktif");
    $this->db->join("jenis_surat", "inaktif.id_jenis = jenis_surat.id_jenis");
    $this->db->where('inaktif.id_jenis', $jenis);
    $this->db->limit(1);
    return $this->db->get()->result();
  }

  public function update($id, $jenis, $masa)
  {
    $this->db->where('id_inaktif', $id);
    return $this->db->update(
      'inaktif',
      array('id_jenis' => $jenis, 'masa_aktif' => $masa)
    );
  }

  public function delete($id)
  {
    $this->db->where('id_inaktif', $id);
    return $this->db->delete('inaktif');
  }
}

?>
