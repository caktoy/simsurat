<?php
/**
 *
 */
class m_security extends CI_Model
{

  public function __construct()
  {
    parent::__construct();
  }

  public function check()
	{
		$nip=$this->session->userdata('nip');
		if(empty($nip))
		{
			$this->session->sess_destroy();
			redirect('/login');
		}
	}

  public function gen_ai_id($tabel, $kolom)
  {
    $this->db->select_max($kolom, 'id');
    $data = $this->db->get($tabel)->result();
    return ($data[0]->id + 1);
  }
}

?>
