<?php
/**
 *
 */
class M_Disposisi extends CI_Model
{

  function __construct()
  {
    parent::__construct();
  }

  public function create($id, $nip, $surat, $kepada, $tanggal)
  {
    return $this->db->insert(
      'disposisi',
      array(
        'id' => $id,
        'nip' => $nip,
        'id_surat' => $surat,
        'kepada' => $kepada,
        'tanggal' => $tanggal
      )
    );
  }

  public function update($id, $nip, $surat, $kepada, $tanggal)
  {
    $this->db->where('id', $id);
    return $this->db->update(
      'disposisi',
      array(
        'nip' => $nip,
        'id_surat' => $surat,
        'kepada' => $kepada,
        'tanggal' => $tanggal
      )
    );
  }

  public function get_all()
  {
    return $this->db->get('disposisi')->result();
  }

  public function get_id($id)
  {
    return $this->db->get_where('disposisi', array('id' => $id))->result();
  }

  public function get_surat($surat)
  {
    return $this->db->get_where('disposisi', array('id_surat' => $surat))->result();
  }

  public function get_where(array $where = array())
  {
    $this->db->select("disposisi.ID, disposisi.NIP, disposisi.ID_SURAT, surat.DARI, surat.KEPADA,
    disposisi.TANGGAL AS TANGGAL_DISPOSISI, surat.JUDUL_KOP, surat.NOMOR, surat.TANGGAL AS TANGGAL_SURAT");
    $this->db->from("disposisi");
    $this->db->join("pegawai", "disposisi.nip = pegawai.nip");
    $this->db->join("surat", "disposisi.id_surat = surat.id_surat");
    $this->db->where($where);
    return $this->db->get()->result();
  }

  public function get_unprocessed($nip)
  {
    return $this->db->query("SELECT
    	disposisi.ID,
    	disposisi.NIP,
    	disposisi.ID_SURAT,
      surat.DARI,
    	surat.KEPADA,
    	Max(disposisi.TANGGAL) AS TANGGAL_DISPOSISI,
    	surat.JUDUL_KOP,
    	surat.NOMOR,
    	surat.TANGGAL AS TANGGAL_SURAT
    FROM
    	disposisi
    INNER JOIN surat ON disposisi.ID_SURAT = surat.ID_SURAT
    WHERE
    	disposisi.NIP = '$nip'
    GROUP BY
    	disposisi.ID,
    	disposisi.NIP,
    	disposisi.ID_SURAT,
      surat.DARI,
    	surat.KEPADA,
      surat.JUDUL_KOP,
    	surat.NOMOR,
    	surat.TANGGAL")->result();
  }

  public function delete($id)
  {
    $this->db->where('id', $id);
    return $this->db->delete('disposisi');
  }
}

?>
