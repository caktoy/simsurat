<?php
/**
 *
 */
class M_Jenis extends CI_Model
{

  function __construct()
  {
    parent::__construct();
  }

  public function create($id, $nama)
  {
    return $this->db->insert(
      'jenis_surat',
      array('id_jenis' => $id, 'nama' => $nama)
    );
  }

  public function get_all()
  {
    return $this->db->get('jenis_surat')->result();
  }

  public function get_id($id)
  {
    $this->db->where('id_jenis', $id);
    return $this->db->get('jenis_surat')->result();
  }



  public function get_not_in($table)
  {
    $this->db->select("id_jenis");
    $this->db->distinct();
    $this->db->from($table);
    $query = $this->db->get()->result();
    $jenis = array();
    for ($i=0; $i < count($query); $i++) {
      $jenis[$i] = $query[$i]->id_jenis;
    }

    $this->db->select("*");
    $this->db->from("jenis_surat");
    $this->db->where_not_in('id_jenis', $jenis);
    return $this->db->get()->result();
  }

  public function update($id, $nama)
  {
    $this->db->where('id_jenis', $id);
    return $this->db->update(
      'jenis_surat',
      array('nama' => $nama)
    );
  }

  public function delete($id)
  {
    $this->db->where('id_jenis', $id);
    return $this->db->delete('jenis_surat');
  }
}

?>
