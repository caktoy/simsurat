<?php
/**
 *
 */
class M_Riwayat_Retensi extends CI_Model
{

  function __construct()
  {
    parent::__construct();
  }

  public function create($id, $surat, $retensi, $tanggal)
  {
    return $this->db->insert(
      'riwayat_retensi',
      array(
        'id' => $id,
        'id_surat' => $surat,
        'id_jadwal' => $retensi,
        'tanggal_retensi' => $tanggal
      )
    );
  }

  public function update($id, $surat, $retensi, $tanggal)
  {
    $this->db->where('id', $id);
    return $this->db->update(
      'riwayat_retensi',
      array(
        'id_surat' => $surat,
        'id_jadwal' => $retensi,
        'tanggal_retensi' => $tanggal
      )
    );
  }

  public function update_surat($surat, $retensi, $tanggal)
  {
    $this->db->where('id_surat', $surat);
    return $this->db->update(
      'riwayat_retensi',
      array(
        'id_jadwal' => $retensi,
        'tanggal_retensi' => $tanggal
      )
    );
  }

  public function get_all()
  {
    return $this->db->get('riwayat_retensi')->result();
  }

  public function get_id($id)
  {
    return $this->db->get_where('riwayat_retensi', array('id' => $id))->result();
  }

  public function get_surat($surat)
  {
    return $this->db->get_where('riwayat_retensi', array('id_surat' => $surat))->result();
  }

  public function delete($id)
  {
    $this->db->where('id', $id);
    return $this->db->delete('riwayat_retensi');
  }

  public function delete_surat($surat)
  {
    $this->db->where('id_surat', $surat);
    return $this->db->delete('riwayat_retensi');
  }
}

?>
