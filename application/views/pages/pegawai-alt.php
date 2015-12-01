<h1><?php echo $judul; ?></h1><hr>
<?php if (isset($_SESSION['pesan'])) { ?>
  <div class="alert alert-block alert-info" role="alert">
    <button type="button" class="close" data-dismiss="alert">
      <i class="ace-icon fa fa-times"></i>
    </button>
    <?php echo $this->session->flashdata('pesan'); ?>
  </div>
<?php } ?>
<div class="row">
  <div class="col-xs-12">
    <div class="clearfix">
			<div class="pull-right tableTools-container"></div>
		</div>
		<div class="table-header">
			Daftar Pegawai
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
        <th>Jabatan</th>
        <th>Unit Kerja</th>
        <th>Jenis Kelamin</th>
        <th>Alamat</th>
        <th>Opsi</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($pegawai as $k) { ?>
      <tr>
        <td><?php echo $k->NIP; ?></td>
        <td><?php echo $k->NAMA; ?></td>
        <td><?php echo $k->JABATAN; ?></td>
        <td><?php echo $k->UNIT_KERJA; ?></td>
        <td><?php echo $k->JENIS_KELAMIN=='L'?"Laki-laki":"Perempuan"; ?></td>
        <td><?php echo $k->ALAMAT; ?></td>
        <td style="text-align: center;">
          <div class="hidden-sm hidden-xs action-buttons">
						<a class="green" href="#modal-edit" data-toggle="modal" role="button" onclick="edit(<?php echo $k->NIP; ?>)">
							<i class="ace-icon fa fa-pencil bigger-130"></i>
						</a>
						<a class="red" href="<?php echo base_url().'index.php/master/pegawai_act/hapus-'.$k->NIP; ?>" onclick="return confirm('Anda yakin?');">
							<i class="ace-icon fa fa-trash-o bigger-130"></i>
						</a>
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
					Tambah pegawai
				</div>
			</div>
      <form class='form-horizontal' role='form' action='<?php echo base_url()."index.php/pegawai_act/tambah"; ?>' method='post'>
      <div class='modal-body no-padding'>
        <div class='form-group'>
          <label class='col-sm-4 control-label no-padding-right' for='nip'>NIP</label>
          <div class='col-sm-7'>
            <input type='text' id='nip' name='nip' placeholder='NIP' class='col-xs-10 col-sm-9' readonly="" required="" />
          </div>
        </div>
        <div class='form-group'>
          <label class='col-sm-4 control-label no-padding-right' for='nama'>Nama</label>
          <div class='col-sm-7'>
            <input type='text' id='nama' name="nama" placeholder='Nama' class='col-xs-10 col-sm-12' required="" />
          </div>
        </div>
        <div class='form-group'>
          <label class='col-sm-4 control-label no-padding-right' for='tgl-l'>Tanggal Lahir</label>
          <div class='col-sm-5'>
            <div class="input-group">
							<input class="form-control date-picker" id="tgl-l" type="text" data-date-format="dd-mm-yyyy" />
							<span class="input-group-addon">
								<i class="fa fa-calendar bigger-110"></i>
							</span>
						</div>
          </div>
        </div>
        <div class='form-group'>
          <label class='col-sm-4 control-label no-padding-right' for='tgl-p'>Tanggal Pengangkatan</label>
          <div class='col-sm-5'>
            <div class="input-group">
							<input class="form-control date-picker" id="tgl-p" type="text" data-date-format="dd-mm-yyyy" />
							<span class="input-group-addon">
								<i class="fa fa-calendar bigger-110"></i>
							</span>
						</div>
          </div>
        </div>
        <div class='form-group'>
          <label class='col-sm-4 control-label no-padding-right' for='jk'>Jenis Kelamin</label>
          <div class='col-sm-7'>
            <select name="jk" id='jk' class='col-xs-10 col-sm-6'>
              <option value="L">Laki-laki</option>
              <option value="P">Perempuan</option>
            </select>
          </div>
        </div>
        <div class='form-group'>
          <label class='col-sm-4 control-label no-padding-right' for='unit'>Unit Kerja</label>
          <div class='col-sm-7'>
            <select id="unit" name="unit" class="col-xs-10 col-sm-9" required="">
            <?php foreach($unit_kerja as $uk) { ?>
              <option value="<?php echo $uk->ID_UNIT; ?>"><?php echo $uk->NAMA; ?></option>
            <?php } ?>
            </select>
          </div>
        </div>
        <div class='form-group'>
          <label class='col-sm-4 control-label no-padding-right' for='jabatan'>Jabatan</label>
          <div class='col-sm-7'>
            <select id="jabatan" name="jabatan" class="col-xs-10 col-sm-9" required="">
            <?php foreach($jabatan as $j) { ?>
              <option value="<?php echo $j->ID_JABATAN; ?>"><?php echo $j->NAMA; ?></option>
            <?php } ?>
            </select>
          </div>
        </div>
        <div class='form-group'>
          <label class='col-sm-4 control-label no-padding-right' for='alamat'>Alamat</label>
          <div class='col-sm-7'>
            <textarea name="alamat" id="alamat" placeholder="Alamat" class="col-xs-10 col-sm-12"></textarea>
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

<div id="modal-edit" class="modal fade" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header no-padding">
				<div class="table-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
						<span class="white">&times;</span>
					</button>
					Edit pegawai
				</div>
			</div>
      <div id="edit"></div>
    </div>
  </div>
</div>

<script type="text/javascript">
  function edit(id) {
    $.ajax({
      url: '<?php echo base_url()."index.php/master/pegawai_act/edit" ?>',
      type: 'POST',
      data: {'nip': id},
      success: function(result) {
        $('#edit').html(result);
      },
      error: function(xhr, status, error) {
        $('#edit').html("Terjadi kesalahan!");
      }
    })
  }
</script>
