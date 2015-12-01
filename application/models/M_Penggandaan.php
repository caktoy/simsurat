<?php
/**
 *
 */
class M_Penggandaan extends CI_Model
{

  function __construct()
  {
    parent::__construct();
  }

  public function create($id, $nip, $surat, $tujuan, $tanggal)
  {
    return $this->db->insert(
      'penggandaan',
      array(
        'id' => $id,
        'nip' => $nip,
        'id_surat' => $surat,
        'tujuan' => $tujuan,
        'tanggal' => $tanggal
      )
    );
  }

  public function update($id, $nip, $surat, $tujuan, $tanggal)
  {
    $this->db->where('id', $id);
    return $this->db->update(
      'penggandaan',
      array(
        'nip' => $nip,
        'id_surat' => $surat,
        'tujuan' => $tujuan,
        'tanggal' => $tanggal
      )
    );
  }

  public function get_all()
  {
    return $this->db->get('penggandaan')->result();
  }

  public function get_id($id)
  {
    return $this->db->get_where('penggandaan', array('id' => $id))->result();
  }

  public function get_surat($surat)
  {
    return $this->db->get_where('penggandaan', array('id_surat' => $surat))->result();
  }

  public function delete($id)
  {
    $this->db->where('id', $id);
    return $this->db->delete('penggandaan');
  }

  public function delete_surat($surat)
  {
    $this->db->where('id_surat', $surat);
    return $this->db->delete('penggandaan');
  }
}

?>
