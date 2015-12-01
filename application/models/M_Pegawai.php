<?php
/**
 *
 */
class M_Pegawai extends CI_Model
{

  function __construct()
  {
    parent::__construct();
  }

  public function create($nip, $unit, $jabatan, $nama, $tgl_l, $jk, $alamat, $tgl_p)
  {
    return $this->db->insert(
      'pegawai',
      array(
        'nip' => $nip,
        'id_unit' => $unit,
        'id_jabatan' => $jabatan,
        'nama' => $nama,
        'tanggal_lahir' => $tgl_l,
        'jenis_kelamin' => $jk,
        'alamat' => $alamat,
        'tanggal_pengangkatan' => $tgl_p
      )
    );
  }

  public function get_all()
  {
    $this->db->select('pegawai.*, unit_kerja.nama as UNIT_KERJA, jabatan.nama as JABATAN');
    $this->db->from('pegawai');
    $this->db->join('unit_kerja', 'pegawai.id_unit = unit_kerja.id_unit', 'left');
    $this->db->join('jabatan', 'pegawai.id_jabatan = jabatan.id_jabatan', 'left');
    return $this->db->get()->result();
  }

  public function get_unit($unit)
  {
    $this->db->select('pegawai.*, unit_kerja.nama as UNIT_KERJA, jabatan.nama as JABATAN');
    $this->db->from('pegawai');
    $this->db->join('unit_kerja', 'pegawai.id_unit = unit_kerja.id_unit');
    $this->db->join('jabatan', 'pegawai.id_jabatan = jabatan.id_jabatan');
    $this->db->where('pegawai.id_unit', $unit);
    return $this->db->get()->result();
  }

  public function get_id($id)
  {
    $this->db->where('nip', $id);
    return $this->db->get('pegawai')->result();
  }

  public function update($nip, $unit, $jabatan, $nama, $tgl_l, $jk, $alamat, $tgl_p)
  {
    $this->db->where('nip', $nip);
    return $this->db->update(
      'pegawai',
      array(
        'id_unit' => $unit,
        'id_jabatan' => $jabatan,
        'nama' => $nama,
        'tanggal_lahir' => $tgl_l,
        'jenis_kelamin' => $jk,
        'alamat' => $alamat,
        'tanggal_pengangkatan' => $tgl_p
      )
    );
  }

  public function delete($id)
  {
    $this->db->where('nip', $id);
    return $this->db->delete('pegawai');
  }

  public function get_for_id($tgl_l, $tgl_p, $jk)
  {
    return $this->db->select("NIP")
      ->from('pegawai')
      ->where('TANGGAL_LAHIR', $tgl_l)
      ->where('TANGGAL_PENGANGKATAN', $tgl_p)
      ->where('JENIS_KELAMIN', $jk)
      ->count_all_results();
  }
}

?>
