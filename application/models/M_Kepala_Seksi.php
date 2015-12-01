<?php
/**
 *
 */
class M_Kepala_Seksi extends CI_Model
{

  function __construct()
  {
    parent::__construct();
  }

  public function create($id, $nip)
  {
    return $this->db->insert(
      'kepala_seksi',
      array('id_unit' => $id, 'nip' => $nip)
    );
  }

  public function get_all()
  {
    return $this->db->get('kepala_seksi')->result();
  }

  public function get_unit($id)
  {
    $this->db->where('id_unit', $id);
    return $this->db->get('kepala_seksi')->result();
  }

  public function get_pegawai($nip)
  {
    $this->db->where('nip', $nip);
    return $this->db->get('kepala_seksi')->result();
  }

  public function get_all_kepala()
  {
    return $this->db->query("SELECT
      	unit_kerja.ID_UNIT,
      	unit_kerja.NAMA AS UNIT,
      	kepala_seksi.NIP,
      	pegawai.NAMA AS KEPALA
      FROM
      	unit_kerja
      LEFT JOIN kepala_seksi ON kepala_seksi.ID_UNIT = unit_kerja.ID_UNIT
      LEFT JOIN pegawai ON pegawai.ID_UNIT = unit_kerja.ID_UNIT
      	AND kepala_seksi.NIP = pegawai.NIP")->result();
  }

  public function get_not_in($table)
  {
    $this->db->select("id_unit");
    $this->db->distinct();
    $this->db->from($table);
    $query = $this->db->get()->result();
    $jenis = array();
    for ($i=0; $i < count($query); $i++) {
      $jenis[$i] = $query[$i]->id_unit;
    }

    $this->db->select("*");
    $this->db->from("kepala_seksi");
    $this->db->where_not_in('id_unit', $jenis);
    return $this->db->get()->result();
  }

  public function update($id, $nip)
  {
    $this->db->where('id_unit', $id);
    return $this->db->update(
      'kepala_seksi',
      array('nip' => $nip)
    );
  }

  public function delete($id)
  {
    $this->db->where('id_unit', $id);
    return $this->db->delete('kepala_seksi');
  }
}

?>
