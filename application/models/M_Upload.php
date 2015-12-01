<?php
/**
 *
 */
class M_Upload extends CI_Model
{

  function __construct()
  {
    parent::__construct();
  }

  public function create($id, $surat, $path)
  {
    return $this->db->insert(
      'upload',
      array(
        'id_upload' => $id,
        'id_surat' => $surat,
        'path' => $path
      )
    );
  }

  public function get_all()
  {
    return $this->db->get('upload')->result();
  }

  public function get_id($id)
  {
    return $this->db->get_where('upload', array('id_upload' => $id))->result();
  }

  public function get_surat($surat)
  {
    return $this->db->get_where('upload', array('id_surat' => $surat))->result();
  }

  public function delete($id)
  {
    $this->db->where('id_upload', $id);
    return $this->db->delete('upload');
  }

  public function delete_surat($surat)
  {
    $this->db->where('id_surat', $surat);
    return $this->db->delete('upload');
  }
}
?>
