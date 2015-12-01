<?php
/**
 *
 */
class M_Unit extends CI_Model
{

  function __construct()
  {
    parent::__construct();
  }

  public function create($id, $nama)
  {
    return $this->db->insert(
      'unit_kerja',
      array('id_unit' => $id, 'nama' => $nama)
    );
  }

  public function get_all()
  {
    return $this->db->get('unit_kerja')->result();
  }

  public function get_id($id)
  {
    $this->db->where('id_unit', $id);
    return $this->db->get('unit_kerja')->result();
  }

  public function update($id, $nama)
  {
    $this->db->where('id_unit', $id);
    return $this->db->update(
      'unit_kerja',
      array('nama' => $nama)
    );
  }

  public function delete($id)
  {
    $this->db->where('id_unit', $id);
    return $this->db->delete('unit_kerja');
  }
}

?>
