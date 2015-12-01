<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *
 */
class Pengguna extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
  }

  // pengguna
  public function lihat($id)
  {
    $this->m_security->check();
    $data = $this->m_pengguna->get_pengguna($id);
    echo "
    <form class='form-horizontal' role='form'>
      <div class='form-group'>
        <label class='col-sm-3 control-label no-padding-right' for='nip'>NIP</label>
        <div class='col-sm-9'>
          <input type='text' id='nip' placeholder='nip' class='col-xs-10 col-sm-6' value='".$data[0]->NIP."' disabled />
        </div>
      </div>
      <div class='form-group'>
        <label class='col-sm-3 control-label no-padding-right' for='nama'>Nama</label>
        <div class='col-sm-9'>
          <input type='text' id='nama' placeholder='Nama' class='col-xs-10 col-sm-9' value='".$data[0]->NAMA."' disabled />
        </div>
      </div>
      <div class='form-group'>
        <label class='col-sm-3 control-label no-padding-right' for='tanggal'>Tanggal Lahir</label>
        <div class='col-sm-9'>
          <input type='text' id='tanggal' placeholder='Tanggal Lahir' class='col-xs-10 col-sm-9' value='".date("d-M-Y", strtotime($data[0]->TANGGAL_LAHIR))."' disabled />
        </div>
      </div>
      <div class='form-group'>
        <label class='col-sm-3 control-label no-padding-right' for='email'>Email</label>
        <div class='col-sm-9'>
          <input type='text' id='email' placeholder='Email' class='col-xs-10 col-sm-9' value='".$data[0]->EMAIL."' disabled />
        </div>
      </div>
      <div class='form-group'>
        <label class='col-sm-3 control-label no-padding-right' for='alamat'>Alamat</label>
        <div class='col-sm-9'>
          <textarea id='alamat' placeholder='Alamat' class='col-xs-10 col-sm-9' disabled>".$data[0]->ALAMAT."</textarea>
        </div>
      </div>
    </form>";
  }

  private function selected_attr($var1, $var2) {
    return $var1==$var2?'selected':'';
  }

  public function edit($id)
  {
    $this->m_security->check();
    $data = $this->m_pengguna->get_pengguna($id);
    echo "
    <form class='form-horizontal' role='form' action='".base_url()."index.php/pengguna/update' method='post'>
    <div class='modal-body no-padding'>
        <div class='form-group'>
          <label class='col-sm-3 control-label no-padding-right' for='nip'>NIP</label>
          <div class='col-sm-9'>
            <input type='text' id='nip' name='nip' placeholder='NIP' class='col-xs-10 col-sm-6' value='".$data[0]->NIP."' readonly />
          </div>
        </div>
        <div class='form-group'>
          <label class='col-sm-3 control-label no-padding-right' for='nama'>Nama</label>
          <div class='col-sm-9'>
            <input type='text' id='nama' placeholder='Nama' class='col-xs-10 col-sm-9' value='".$data[0]->NAMA."' disabled />
          </div>
        </div>
        <div class='form-group'>
          <label class='col-sm-3 control-label no-padding-right' for='email'>Email</label>
          <div class='col-sm-9'>
            <input type='text' id='email' name='email' placeholder='Email' class='col-xs-10 col-sm-9' value='".$data[0]->EMAIL."' required />
          </div>
        </div>
        <div class='form-group'>
          <label class='col-sm-3 control-label no-padding-right' for='prev'>Hak Akses</label>
          <div class='col-sm-9'>
            <select id='prev' name='prev' class='col-xs-10 col-sm-9' required>
              <option value='0' ".$this->selected_attr($data[0]->PREVILAGE, 0).">Normal</option>
              <option value='1' ".$this->selected_attr($data[0]->PREVILAGE, 1).">Admin</option>
            </select>
          </div>
        </div>
    </div>
    <div class='modal-footer no-margin-top'>
      <button class='btn btn-sm btn-danger pull-left' data-dismiss='modal'>
        <i class='ace-icon fa fa-times'></i> Tutup
      </button>&nbsp;
      <button class='btn btn-primary btn-sm' type='submit'>
        <i class='ace-icon fa fa-check'></i> Simpan
      </button>
    </div>
    </form>
    ";
  }

  public function tambah()
  {
    $this->m_security->check();
    $nip = $this->input->post('nip');
    $email = $this->input->post('email');
    $password = $this->input->post('pass');
    $previlage = $this->input->post('prev');
    $this->m_pengguna->create($nip, $email, $password, $previlage);
    return redirect('/page/pengguna');
  }

  public function update()
  {
    $this->m_security->check();
    $nip = $this->input->post('nip');
    $email = $this->input->post('email');
    $previlage = $this->input->post('prev');
    $this->m_pengguna->update($nip, $email, $previlage);
    return redirect('/page/pengguna');
  }

  public function hapus($id)
  {
    $this->m_security->check();
    $this->m_pengguna->delete($id);
    return redirect('/page/pengguna');
  }

  public function cari_karyawan()
  {
    $nip = $this->input->post('nip');

    $data = $this->m_pegawai->get_id($nip);

    $cek_ = $this->m_pengguna->get_pengguna_by_nip($nip);
    if (empty($cek_)) {
      echo count($data)>0?$data[0]->NAMA:'';
    }
  }
}
?>
