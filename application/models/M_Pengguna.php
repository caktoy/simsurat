<?php
/**
 *
 */
class M_Pengguna extends CI_Model
{

  public function __construct()
  {
    parent::__construct();
  }

  public function auth($nip, $pass)
  {
    return $this->db->get_where(
      'pengguna',
      array(
        'nip' => $nip,
        'password' => md5($pass)
      ),
      1
    )->result();
  }

  public function get_pengguna($id)
  {
    $this->db->select('*');
    $this->db->from('pengguna');
    $this->db->join('pegawai', 'pengguna.nip = pegawai.nip');
    $this->db->where('id_pengguna', $id);
    $this->db->limit(1);
    return $this->db->get()->result();
  }

  public function get_pengguna_by_nip($nip)
  {
    $this->db->select('*');
    $this->db->from('pengguna');
    $this->db->join('pegawai', 'pengguna.nip = pegawai.nip');
    $this->db->where('pengguna.nip', $nip);
    return $this->db->get()->result();
  }

  public function get_all()
  {
    $this->db->select('*');
    $this->db->from('pengguna');
    $this->db->join('pegawai', 'pengguna.nip = pegawai.nip');
    return $this->db->get()->result();
  }

  public function create($nip, $email, $password, $previlage)
  {
    $this->db->select_max('id_pengguna', 'id');
    $data = $this->db->get('pengguna')->result();
    return $this->db->insert(
      'pengguna',
      array(
        'id_pengguna' => $data[0]->id + 1,
        'nip' => $nip,
        'email' => $email,
        'password' => md5($password),
        'previlage' => $previlage
      )
    );
  }

  public function update($nip, $email, $previlage)
  {
    $this->db->where('nip', $nip);
    return $this->db->update(
      'pengguna',
      array(
        'email' => $email,
        'previlage' => $previlage
      )
    );
  }

  public function delete($id)
  {
    $this->db->where('id_pengguna', $id);
    return $this->db->delete('pengguna');
  }

  public function getMaxId()
  {
    $this->db->select_max('id_pengguna');
    return $this->db->get('pengguna');
  }
}
?>
