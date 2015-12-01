<?php
/**
 *
 */
class M_Jabatan extends CI_Model
{

  function __construct()
  {
    parent::__construct();
  }

  public function create($id, $nama, $kepala, $disposisi)
  {
    return $this->db->insert(
      'jabatan',
      array(
        'id_jabatan' => $id,
        'nama' => $nama,
        'id_kepala' => $kepala,
        'status_disposisi' => $disposisi
      )
    );
  }

  public function get_all()
  {
    $this->db->select("a.ID_JABATAN, a.NAMA, a.ID_KEPALA, b.NAMA as KEPALA, a.STATUS_DISPOSISI");
    $this->db->from("jabatan as a");
    $this->db->join("jabatan as b", "a.id_kepala = b.id_jabatan", "left");
    $this->db->order_by("ID_KEPALA", "asc");
    return $this->db->get()->result();
  }

  public function get_id($id)
  {
    $this->db->select("a.ID_JABATAN, a.NAMA, a.ID_KEPALA, b.NAMA as KEPALA, a.STATUS_DISPOSISI");
    $this->db->from("jabatan as a");
    $this->db->join("jabatan as b", "a.id_kepala = b.id_jabatan", "left");
    $this->db->where('id_jabatan', $id);
    return $this->db->get()->result();
  }

  public function update($id, $nama, $kepala, $disposisi)
  {
    $this->db->where('id_jabatan', $id);
    return $this->db->update(
      'jabatan',
      array(
        'nama' => $nama,
        'id_kepala' => $kepala,
        'status_disposisi' => $disposisi
      )
    );
  }

  public function delete($id)
  {
    $this->db->where('id_jabatan', $id);
    return $this->db->delete('jabatan');
  }
}

?>
