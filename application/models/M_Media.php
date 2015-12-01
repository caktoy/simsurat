<?php
/**
 *
 */
class M_Media extends CI_Model
{

  function __construct()
  {
    parent::__construct();
  }

  public function create($id, $nama)
  {
    return $this->db->insert(
      'media',
      array('id_media' => $id, 'nama' => $nama)
    );
  }

  public function get_all()
  {
    return $this->db->get('media')->result();
  }

  public function get_id($id)
  {
    $this->db->where('id_media', $id);
    return $this->db->get('media')->result();
  }

  public function update($id, $nama)
  {
    $this->db->where('id_media', $id);
    return $this->db->update(
      'media',
      array('nama' => $nama)
    );
  }

  public function delete($id)
  {
    $this->db->where('id_media', $id);
    return $this->db->delete('media');
  }
}

?>
