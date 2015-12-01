<?php
/**
 *
 */
class M_Peminjaman extends CI_Model
{

  function __construct()
  {
    parent::__construct();
  }

  public function create($id, $nip, $surat, $keperluan, $tanggal_pinjam, $lama_pinjam, $tanggal_kembali, $status)
  {
    return $this->db->insert(
      'peminjaman',
      array(
        'id' => $id,
        'nip' => $nip,
        'id_surat' => $id_surat,
        'keperluan' => $keperluan,
        'tanggal_pinjam' => $tanggal_pinjam,
        'lama_pinjam' => $lama_pinjam,
        'tanggal_kembali' => $tanggal_kembali,
        'status_pinjam' => $status
      )
    );
  }

  public function arr_create($value)
  {
    return $this->db->insert('peminjaman', $value);
  }

  public function get_all()
  {
    $this->db->select('*');
    $this->db->from('peminjaman');
    $this->db->join('surat', 'peminjaman.id_surat = surat.id_surat');
    $this->db->join('pegawai', 'peminjaman.nip = pegawai.nip');
    return $this->db->get()->result();
  }

  public function get_surat($surat)
  {
    $this->db->select('*');
    $this->db->from('peminjaman');
    $this->db->join('surat', 'peminjaman.id_surat = surat.id_surat');
    $this->db->join('pegawai', 'peminjaman.nip = pegawai.nip');
    $this->db->where('peminjaman.id_surat', $surat);
    return $this->db->get()->result();
  }

  public function get_pegawai($nip)
  {
    $this->db->select('*');
    $this->db->from('peminjaman');
    $this->db->join('surat', 'peminjaman.id_surat = surat.id_surat');
    $this->db->join('pegawai', 'peminjaman.nip = pegawai.nip');
    $this->db->where('peminjaman.nip', $nip);
    return $this->db->get()->result();
  }

  public function update($id, $nip, $surat, $keperluan, $tanggal_pinjam, $lama_pinjam, $tanggal_kembali, $status)
  {
    $this->db->where('id', $id);
    return $this->db->update(
      'peminjaman',
      array(
        'nip' => $nip,
        'id_surat' => $id_surat,
        'keperluan' => $keperluan,
        'tanggal_pinjam' => $tanggal_pinjam,
        'lama_pinjam' => $lama_pinjam,
        'tanggal_kembali' => $tanggal_kembali,
        'status_pinjam' => $status
      )
    );
  }

  public function update_status($id, $status)
  {
    $this->db->where('id', $id);
    return $this->db->update('peminjaman', array('status_pinjam' => $status));
  }

  public function delete($id)
  {
    $this->db->where('id', $id);
    return $this->db->delete('peminjaman');
  }

  public function set_status($id, $status)
  {
    $this->db->where('id', $id);
    return $this->db->update('peminjaman', array('status_pinjam' => $status));
  }

  public function cek_keterlambatan()
  {
    // lihat tanggal sekarang dari sistem
    $tgl_sekarang = date_create(date("Y-m-d"));
    // ambil data peminjaman dari database YANG dalam proses PINJAM
    $this->db->where("status_pinjam", "pinjam");
    $peminjaman = $this->db->get("peminjaman")->result();
    // lakukan pembacaan setiap data dari data yang diambil
    foreach ($peminjaman as $pinjam) {
      $id = $pinjam->ID;
      $tgl_kembali = date_create(date("Y-m-d", strtotime($pinjam->TANGGAL_KEMBALI)));
      // hitung selisih antara tanggal sekarang dan tanggal kembali
      $diff = date_diff($tgl_sekarang, $tgl_kembali);
      // update data jika nilai selisih tanggal negatif
      if ((int) $diff->format("%R%a") < 0) {
        $this->db->where("id", $id);
        $this->db->update("peminjaman", array("status_pinjam" => "telat"));
      }
    }
  }
}

?>
