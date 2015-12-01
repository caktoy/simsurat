<?php
/**
 *
 */
class M_Riwayat_Inaktif extends CI_Model
{

  function __construct()
  {
    parent::__construct();
  }

  public function create($id, $surat, $inaktif, $tanggal1, $tanggal2)
  {
    return $this->db->insert(
      'riwayat_inaktif',
      array(
        'id' => $id,
        'id_surat' => $surat,
        'id_inaktif' => $inaktif,
        'tanggal_inaktif' => $tanggal1,
        'tanggal_aktif_kembali' => $tanggal2
      )
    );
  }

  public function update($id, $surat, $inaktif, $tanggal1, $tanggal2)
  {
    $this->db->where('id', $id);
    return $this->db->update(
      'riwayat_inaktif',
      array(
        'id_surat' => $surat,
        'id_inaktif' => $inaktif,
        'tanggal_inaktif' => $tanggal1,
        'tanggal_aktif_kembali' => $tanggal2
      )
    );
  }

  public function update_surat($surat, $inaktif, $tanggal1, $tanggal2)
  {
    $this->db->where('id_surat', $surat);
    return $this->db->update(
      'riwayat_inaktif',
      array(
        'id_inaktif' => $inaktif,
        'tanggal_inaktif' => $tanggal1,
        'tanggal_aktif_kembali' => $tanggal2
      )
    );
  }

  public function get_all()
  {
    return $this->db->get('riwayat_inaktif')->result();
  }

  public function get_id($id)
  {
    return $this->db->get_where('riwayat_inaktif', array('id' => $id))->result();
  }

  public function get_surat($surat)
  {
    return $this->db->get_where('riwayat_inaktif', array('id_surat' => $surat))->result();
  }

  public function delete($id)
  {
    $this->db->where('id', $id);
    return $this->db->delete('riwayat_inaktif');
  }

  public function delete_surat($surat)
  {
    $this->db->where('id_surat', $surat);
    return $this->db->delete('riwayat_inaktif');
  }
}

?>
