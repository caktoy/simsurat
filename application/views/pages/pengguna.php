<h1><?php echo $judul; ?></h1><hr>
<div class="row">
  <div class="col-xs-12">
    <div class="clearfix">
			<div class="pull-right tableTools-container"></div>
		</div>
		<div class="table-header">
			Daftar Pengguna Aplikasi
      <a href="#modal-tambah" class="btn btn-success btn-sm pull-right" data-toggle="modal" role="button">
        <i class="menu-icon fa fa-plus"></i>
        Tambah
      </a>
		</div>
  <table id="dynamic-table" class="table table-striped table-bordered table-hover">
    <thead>
      <tr>
        <th>NIP</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Hak Akses</th>
        <th>Opsi</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($pengguna as $p) { ?>
      <tr>
        <td><?php echo $p->NIP; ?></td>
        <td><?php echo $p->NAMA; ?></td>
        <td><?php echo $p->EMAIL; ?></td>
        <td><?php echo $p->PREVILAGE==1?"Admin":"Normal"; ?></td>
        <td style="text-align: center;">
          <div class="hidden-sm hidden-xs action-buttons">
						<a class="blue" href="#modal-lihat" data-toggle="modal" role="button" onclick="lihat(<?php echo $p->ID_PENGGUNA; ?>)">
							<i class="ace-icon fa fa-search-plus bigger-130"></i>
						</a>

						<a class="green" href="#modal-edit" data-toggle="modal" role="button" onclick="edit(<?php echo $p->ID_PENGGUNA; ?>)">
							<i class="ace-icon fa fa-pencil bigger-130"></i>
						</a>

            <?php if($p->NIP != $this->session->userdata('nip')) { ?>
						<a class="red" href="<?php echo base_url().'index.php/pengguna/hapus/'.$p->ID_PENGGUNA; ?>" onclick="return confirm('Anda yakin?');">
							<i class="ace-icon fa fa-trash-o bigger-130"></i>
						</a>
            <?php } ?>
					</div>
        </td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
  </div>
</div>

<div id="modal-tambah" class="modal fade" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header no-padding">
				<div class="table-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
						<span class="white">&times;</span>
					</button>
					Tambah Pengguna
				</div>
			</div>
      <form class='form-horizontal' role='form' action='<?php echo base_url()."index.php/pengguna/tambah"; ?>' method='post'>
      <div class='modal-body no-padding'>
          <div class='form-group'>
            <label class='col-sm-3 control-label no-padding-right' for='nip'>NIP</label>
            <div class='col-sm-8'>
              <input type='text' id='nip' name='nip' placeholder='NIP' class='col-xs-10 col-sm-6' required="" />
            </div>
          </div>
          <div class='form-group'>
            <label class='col-sm-3 control-label no-padding-right' for='nama'>Nama</label>
            <div class='col-sm-9'>
              <input type='text' id='nama' placeholder='Nama' class='col-xs-10 col-sm-9' readonly="" required="" />
            </div>
          </div>
          <div class='form-group'>
            <label class='col-sm-3 control-label no-padding-right' for='pass'>Password</label>
            <div class='col-sm-9'>
              <input type='password' id='pass' name='pass' placeholder='Password' class='col-xs-10 col-sm-9' required="" />
            </div>
          </div>
          <div class='form-group'>
            <label class='col-sm-3 control-label no-padding-right' for='email'>Email</label>
            <div class='col-sm-9'>
              <input type='text' id='email' name='email' placeholder='Email' class='col-xs-10 col-sm-9' required="" />
            </div>
          </div>
          <div class='form-group'>
            <label class='col-sm-3 control-label no-padding-right' for='prev'>Hak Akses</label>
            <div class='col-sm-9'>
              <select id='prev' name='prev' class='col-xs-10 col-sm-9' required>
                <option>-- Pilih --</option>
                <option value='0'>Normal</option>
                <option value='1'>Admin</option>
              </select>
            </div>
          </div>
      </div>
      <div class='modal-footer no-margin-top'>
        <button class='btn btn-sm btn-danger pull-left' data-dismiss='modal'>
          <i class='ace-icon fa fa-times'></i> Tutup
        </button>&nbsp;
        <button class='btn btn-primary btn-sm' type='submit' id="btn-simpan">
          <i class='ace-icon fa fa-check'></i> Simpan
        </button>
      </div>
      </form>
    </div>
  </div>
</div>

<div id="modal-lihat" class="modal fade" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header no-padding">
				<div class="table-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
						<span class="white">&times;</span>
					</button>
					Detil Pengguna
				</div>
			</div>
			<div class="modal-body no-padding" id="lihat"></div>
      <div class="modal-footer no-margin-top">
  			<button class="btn btn-sm btn-danger pull-left" data-dismiss="modal">
  				<i class="ace-icon fa fa-times"></i>
  				Tutup
  			</button>
      </div>
    </div>
  </div>
</div>

<div id="modal-edit" class="modal fade" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header no-padding">
				<div class="table-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
						<span class="white">&times;</span>
					</button>
					Edit Pengguna
				</div>
			</div>
      <div id="edit"></div>
    </div>
  </div>
</div>

<script type="text/javascript">
  function lihat(id) {
    $.ajax({
      url: '<?php echo base_url()."index.php/pengguna/lihat/" ?>' + id,
      type: 'GET',
      success: function(result) {
        $('#lihat').html(result);
      },
      error: function(xhr, status, error) {
        $('#lihat').html("Terjadi kesalahan!");
      }
    })
  }

  function edit(id) {
    $.ajax({
      url: '<?php echo base_url()."index.php/pengguna/edit/" ?>' + id,
      type: 'GET',
      success: function(result) {
        $('#edit').html(result);
      },
      error: function(xhr, status, error) {
        $('#edit').html("Terjadi kesalahan!");
      }
    })
  }
</script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#btn-simpan').attr('disabled', true);
    $('#nip').change(function() {
      var nip = $(this).val();
      $.ajax({
        url: '<?php echo base_url()."index.php/pengguna/cari_karyawan"; ?>',
        type: 'POST',
        data: {'nip': nip},
        success: function(result) {
          $('#nama').val(result);
          $('#btn-simpan').attr('disabled', false);
        },
        error: function(xhr, status, error) {
          $('#nama').val('');
          $('#btn-simpan').attr('disabled', true);
        }
      });
    });
  });
</script>
