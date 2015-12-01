<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *
 */
class Master extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
  }

  public function jabatan()
  {
    $this->m_security->check();
    $data['judul'] = 'Master Jabatan';
    $data['konten'] = 'pages/jabatan';

    $data['id_jabatan'] = $this->m_security->gen_ai_id('jabatan', 'id_jabatan');
    $data['jabatan'] = $this->m_jabatan->get_all();

    return $this->load->view('index', $data);
  }

  public function jabatan_act($act)
  {
    $this->m_security->check();
    if ($act == 'tambah') {
      $id = $this->input->post('id');
      $nama = $this->input->post('nama');
      $kepala = $this->input->post('kepala')==''?NULL:$this->input->post('kepala');
      $disposisi = $this->input->post('disposisi');
      $query = $this->m_jabatan->create($id, $nama, $kepala, $disposisi);
      if ($query > 0) {
        $this->session->set_flashdata('pesan', '<b>Berhasil!</b> Data jabatan telah disimpan.');
      } else {
        $this->session->set_flashdata('pesan', '<b>Gagal!</b> Data jabatan gagal disimpan.');
      }
      redirect('/master/jabatan');
    } else if($act == 'ubah') {
      $id = $this->input->post('id-u');
      $nama = $this->input->post('nama-u');
      $kepala = $this->input->post('kepala-u')==''?NULL:$this->input->post('kepala-u');
      $disposisi = $this->input->post('disposisi-u');
      $query = $this->m_jabatan->update($id, $nama, $kepala, $disposisi);
      if ($query > 0) {
        $this->session->set_flashdata('pesan', '<b>Berhasil!</b> Data jabatan telah diubah.');
      } else {
        $this->session->set_flashdata('pesan', '<b>Gagal!</b> Data jabatan gagal diubah.');
      }
      redirect('/master/jabatan');
    } else {
      $var = explode('-', $act);
      $id = $var[1];
      $query = $this->m_jabatan->delete($id);
      if ($query > 0) {
        $this->session->set_flashdata('pesan', '<b>Berhasil!</b> Data jabatan telah dihapus.');
      } else {
        $this->session->set_flashdata('pesan', '<b>Gagal!</b> Data jabatan gagal dihapus.');
      }
      redirect('/master/jabatan');
    }
  }

  public function unit_kerja()
  {
    $this->m_security->check();
    $data['judul'] = 'Master Unit Kerja';
    $data['konten'] = 'pages/unit_kerja';

    $data['id'] = $this->m_security->gen_ai_id('unit_kerja', 'id_unit');
    $data['unit'] = $this->m_unit->get_all();

    return $this->load->view('index', $data);
  }

  public function unit_act($act)
  {
    $this->m_security->check();
    if ($act == 'tambah') {
      $id = $this->input->post('id');
      $nama = $this->input->post('nama');
      $query = $this->m_unit->create($id, $nama);
      if ($query > 0) {
        $this->session->set_flashdata('pesan', '<b>Berhasil!</b> Data unit kerja telah disimpan.');
      } else {
        $this->session->set_flashdata('pesan', '<b>Gagal!</b> Data unit kerja gagal disimpan.');
      }
      redirect('/master/unit_kerja');
    } else if($act == 'ubah') {
      $id = $this->input->post('id-u');
      $nama = $this->input->post('nama-u');
      $query = $this->m_unit->update($id, $nama);
      if ($query > 0) {
        $this->session->set_flashdata('pesan', '<b>Berhasil!</b> Data unit kerja telah diubah.');
      } else {
        $this->session->set_flashdata('pesan', '<b>Gagal!</b> Data unit kerja gagal diubah.');
      }
      redirect('/master/unit_kerja');
    } else {
      $var = explode('-', $act);
      $id = $var[1];
      $query = $this->m_unit->delete($id);
      if ($query > 0) {
        $this->session->set_flashdata('pesan', '<b>Berhasil!</b> Data unit kerja telah dihapus.');
      } else {
        $this->session->set_flashdata('pesan', '<b>Gagal!</b> Data unit kerja gagal dihapus.');
      }
      redirect('/master/unit_kerja');
    }
  }

  public function jenis_surat()
  {
    $this->m_security->check();
    $data['judul'] = 'Master Jenis Surat';
    $data['konten'] = 'pages/jenis_surat';

    $data['id'] = $this->m_security->gen_ai_id('jenis_surat', 'id_jenis');
    $data['jenis'] = $this->m_jenis->get_all();

    return $this->load->view('index', $data);
  }

  public function jenis_act($act)
  {
    $this->m_security->check();
    if ($act == 'tambah') {
      $id = $this->input->post('id');
      $nama = $this->input->post('nama');
      $query = $this->m_jenis->create($id, $nama);
      if ($query > 0) {
        $this->session->set_flashdata('pesan', '<b>Berhasil!</b> Data jenis surat telah disimpan.');
      } else {
        $this->session->set_flashdata('pesan', '<b>Gagal!</b> Data jenis surat gagal disimpan.');
      }
      redirect('/master/jenis_surat');
    } else if($act == 'ubah') {
      $id = $this->input->post('id-u');
      $nama = $this->input->post('nama-u');
      $query = $this->m_jenis->update($id, $nama);
      if ($query > 0) {
        $this->session->set_flashdata('pesan', '<b>Berhasil!</b> Data jenis surat telah diubah.');
      } else {
        $this->session->set_flashdata('pesan', '<b>Gagal!</b> Data jenis surat gagal diubah.');
      }
      redirect('/master/jenis_surat');
    } else {
      $var = explode('-', $act);
      $id = $var[1];
      $query = $this->m_jenis->delete($id);
      if ($query > 0) {
        $this->session->set_flashdata('pesan', '<b>Berhasil!</b> Data jenis surat telah dihapus.');
      } else {
        $this->session->set_flashdata('pesan', '<b>Gagal!</b> Data jenis surat gagal dihapus.');
      }
      redirect('/master/jenis_surat');
    }
  }

  public function lokasi()
  {
    $this->m_security->check();
    $data['judul'] = 'Master Lokasi';
    $data['konten'] = 'pages/lokasi';

    $data['id'] = $this->m_security->gen_ai_id('lokasi', 'id_lokasi');
    $data['lokasi'] = $this->m_lokasi->get_all();

    return $this->load->view('index', $data);
  }

  public function lokasi_act($act)
  {
    $this->m_security->check();
    if ($act == 'tambah') {
      $id = $this->input->post('id');
      $nama = $this->input->post('nama');
      $query = $this->m_lokasi->create($id, $nama);
      if ($query > 0) {
        $this->session->set_flashdata('pesan', '<b>Berhasil!</b> Data lokasi telah disimpan.');
      } else {
        $this->session->set_flashdata('pesan', '<b>Gagal!</b> Data lokasi gagal disimpan.');
      }
      redirect('/master/lokasi');
    } else if($act == 'ubah') {
      $id = $this->input->post('id-u');
      $nama = $this->input->post('nama-u');
      $query = $this->m_lokasi->update($id, $nama);
      if ($query > 0) {
        $this->session->set_flashdata('pesan', '<b>Berhasil!</b> Data lokasi telah diubah.');
      } else {
        $this->session->set_flashdata('pesan', '<b>Gagal!</b> Data lokasi gagal diubah.');
      }
      redirect('/master/lokasi');
    } else {
      $var = explode('-', $act);
      $id = $var[1];
      $query = $this->m_lokasi->delete($id);
      if ($query > 0) {
        $this->session->set_flashdata('pesan', '<b>Berhasil!</b> Data lokasi telah dihapus.');
      } else {
        $this->session->set_flashdata('pesan', '<b>Gagal!</b> Data lokasi gagal dihapus.');
      }
      redirect('/master/lokasi');
    }
  }

  public function media()
  {
    $this->m_security->check();
    $data['judul'] = 'Master Media';
    $data['konten'] = 'pages/media';

    $data['id'] = $this->m_security->gen_ai_id('media', 'id_media');
    $data['media'] = $this->m_media->get_all();

    return $this->load->view('index', $data);
  }

  public function media_act($act)
  {
    $this->m_security->check();
    if ($act == 'tambah') {
      $id = $this->input->post('id');
      $nama = $this->input->post('nama');
      $query = $this->m_media->create($id, $nama);
      if ($query > 0) {
        $this->session->set_flashdata('pesan', '<b>Berhasil!</b> Data media telah disimpan.');
      } else {
        $this->session->set_flashdata('pesan', '<b>Gagal!</b> Data media gagal disimpan.');
      }
      redirect('/master/media');
    } else if($act == 'ubah') {
      $id = $this->input->post('id-u');
      $nama = $this->input->post('nama-u');
      $query = $this->m_media->update($id, $nama);
      if ($query > 0) {
        $this->session->set_flashdata('pesan', '<b>Berhasil!</b> Data media telah diubah.');
      } else {
        $this->session->set_flashdata('pesan', '<b>Gagal!</b> Data media gagal diubah.');
      }
      redirect('/master/media');
    } else {
      $var = explode('-', $act);
      $id = $var[1];
      $query = $this->m_media->delete($id);
      if ($query > 0) {
        $this->session->set_flashdata('pesan', '<b>Berhasil!</b> Data media telah dihapus.');
      } else {
        $this->session->set_flashdata('pesan', '<b>Gagal!</b> Data media gagal dihapus.');
      }
      redirect('/master/media');
    }
  }

  public function retensi()
  {
    $this->m_security->check();
    $data['judul'] = 'Master Jadwal Retensi';
    $data['konten'] = 'pages/retensi';

    $data['id'] = $this->m_security->gen_ai_id('jadwal_retensi', 'id_jadwal');
    $data['retensi'] = $this->m_retensi->get_all();
    $data['available_jenis'] = $this->m_jenis->get_not_in("jadwal_retensi");
    $data['all_jenis'] = $this->m_jenis->get_all();

    return $this->load->view('index', $data);
  }

  public function retensi_act($act)
  {
    $this->m_security->check();
    if ($act == 'tambah') {
      $id = $this->input->post('id');
      $jenis = $this->input->post('jenis');
      $tahun = $this->input->post('tahun');
      $query = $this->m_retensi->create($id, $jenis, $tahun);
      if ($query > 0) {
        $this->session->set_flashdata('pesan', '<b>Berhasil!</b> Jadwal retensi telah disimpan.');
      } else {
        $this->session->set_flashdata('pesan', '<b>Gagal!</b> Jadwal retensi gagal disimpan.');
      }
      redirect('/master/retensi');
    } else if($act == 'ubah') {
      $id = $this->input->post('id-u');
      $jenis = $this->input->post('jenis-u');
      $tahun = $this->input->post('tahun-u');
      $query = $this->m_retensi->update($id, $jenis, $tahun);
      if ($query > 0) {
        $this->session->set_flashdata('pesan', '<b>Berhasil!</b> Jadwal retensi telah diubah.');
      } else {
        $this->session->set_flashdata('pesan', '<b>Gagal!</b> Jadwal retensi gagal diubah.');
      }
      redirect('/master/retensi');
    } else {
      $var = explode('-', $act);
      $id = $var[1];
      $query = $this->m_retensi->delete($id);
      if ($query > 0) {
        $this->session->set_flashdata('pesan', '<b>Berhasil!</b> Jadwal retensi telah dihapus.');
      } else {
        $this->session->set_flashdata('pesan', '<b>Gagal!</b> Jadwal retensi gagal dihapus.');
      }
      redirect('/master/retensi');
    }
  }

  public function inaktif()
  {
    $this->m_security->check();
    $data['judul'] = 'Master Inaktif';
    $data['konten'] = 'pages/inaktif';

    $data['id'] = $this->m_security->gen_ai_id('inaktif', 'id_inaktif');
    $data['inaktif'] = $this->m_inaktif->get_all();
    $data['available_jenis'] = $this->m_jenis->get_not_in("inaktif");
    $data['all_jenis'] = $this->m_jenis->get_all();

    return $this->load->view('index', $data);
  }

  public function inaktif_act($act)
  {
    $this->m_security->check();
    if ($act == 'tambah') {
      $id = $this->input->post('id');
      $jenis = $this->input->post('jenis');
      $tahun = $this->input->post('tahun');
      $query = $this->m_inaktif->create($id, $jenis, $tahun);
      if ($query > 0) {
        $this->session->set_flashdata('pesan', '<b>Berhasil!</b> Jadwal inaktif telah disimpan.');
      } else {
        $this->session->set_flashdata('pesan', '<b>Gagal!</b> Jadwal inaktif gagal disimpan.');
      }
      redirect('/master/inaktif');
    } else if($act == 'ubah') {
      $id = $this->input->post('id-u');
      $jenis = $this->input->post('jenis-u');
      $tahun = $this->input->post('tahun-u');
      $query = $this->m_inaktif->update($id, $jenis, $tahun);
      if ($query > 0) {
        $this->session->set_flashdata('pesan', '<b>Berhasil!</b> Jadwal inaktif telah diubah.');
      } else {
        $this->session->set_flashdata('pesan', '<b>Gagal!</b> Jadwal inaktif gagal diubah.');
      }
      redirect('/master/inaktif');
    } else {
      $var = explode('-', $act);
      $id = $var[1];
      $query = $this->m_inaktif->delete($id);
      if ($query > 0) {
        $this->session->set_flashdata('pesan', '<b>Berhasil!</b> Jadwal inaktif telah dihapus.');
      } else {
        $this->session->set_flashdata('pesan', '<b>Gagal!</b> Jadwal inaktif gagal dihapus.');
      }
      redirect('/master/inaktif');
    }
  }

  public function pegawai()
  {
    $this->m_security->check();
    $data['judul'] = 'Master Pegawai';
    $data['konten'] = 'pages/pegawai';

    $data['pegawai'] = $this->m_pegawai->get_all();
    $data['unit_kerja'] = $this->m_unit->get_all();
    $data['jabatan'] = $this->m_jabatan->get_all();

    return $this->load->view('index', $data);
  }

  public function gen_id_peg()
  {
    $tgl_l = $this->input->post('tgl_l');
    $tgl_p = $this->input->post('tgl_p');
    $jk = $this->input->post('jk');

    $tgl_lahir = date('Ymd', strtotime($tgl_l));
    $tgl_pengangkatan = date('Ym', strtotime($tgl_p));
    $jenis_kelamin = $jk=='L'?1:2;
    $urut = "000".($this->m_pegawai->get_for_id(
      date('Y-m-d', strtotime($tgl_l)), date('Y-m-d', strtotime($tgl_p)), $jk) + 1);
    $seri = substr($urut, strlen($urut)-3, 3);
    echo $tgl_lahir.$tgl_pengangkatan.$jenis_kelamin.$seri;
  }

  public function pegawai_act($act)
  {
    $this->m_security->check();
    $nip = $this->input->post('nip');
    $unit = $this->input->post('unit');
    $jabatan = $this->input->post('jabatan');
    $nama = $this->input->post('nama');
    $tgl_l = date("Y-m-d", strtotime($this->input->post('tgl_l')));
    $jk = $this->input->post('jk');
    $alamat = $this->input->post('alamat');
    $tgl_p = date("Y-m-d", strtotime($this->input->post('tgl_p')));
    if ($act == 'tambah') {
      $query = $this->m_pegawai->create($nip, $unit, $jabatan, $nama, $tgl_l, $jk, $alamat, $tgl_p);
      if ($query > 0) {
        $this->session->set_flashdata('pesan', '<b>Berhasil!</b> Data pegawai telah disimpan.');
      } else {
        $this->session->set_flashdata('pesan', '<b>Gagal!</b> Data pegawai gagal disimpan.');
      }
      redirect('/master/pegawai');
    } else if($act == 'ubah') {
      $query = $this->m_pegawai->update($nip, $unit, $jabatan, $nama, $tgl_l, $jk, $alamat, $tgl_p);
      if ($query > 0) {
        $this->session->set_flashdata('pesan', '<b>Berhasil!</b> Data pegawai telah diubah.');
      } else {
        $this->session->set_flashdata('pesan', '<b>Gagal!</b> Data pegawai gagal diubah.');
      }
      redirect('/master/pegawai');
    } else {
      $var = explode('-', $act);
      $id = $var[1];
      $query = $this->m_pegawai->delete($id);
      if ($query > 0) {
        $this->session->set_flashdata('pesan', '<b>Berhasil!</b> Data pegawai telah dihapus.');
      } else {
        $this->session->set_flashdata('pesan', '<b>Gagal!</b> Data pegawai gagal dihapus.');
      }
      redirect('/master/pegawai');
    }
  }

  public function pegawai_edit($nip)
  {
    $this->m_security->check();
    $data['judul'] = 'Ubah Pegawai';
    $data['konten'] = 'pages/pegawai_ubah';

    $data['pegawai'] = $this->m_pegawai->get_id($nip);
    $data['unit_kerja'] = $this->m_unit->get_all();
    $data['jabatan'] = $this->m_jabatan->get_all();

    return $this->load->view('index', $data);
  }

  public function cari_karyawan()
  {
    $this->m_security->check();
    $id = $this->input->post("id");
    $pegawai = $this->m_pegawai->get_id($id);
    echo count($pegawai)>0?$pegawai[0]->NAMA:NULL;
  }
}

?>
