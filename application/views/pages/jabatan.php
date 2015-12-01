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
  <div class="col-sm-5">
    <div class="widget-box">
      <div class="widget-header widget-header-flat">
        <h4 class="widget-title smaller">Tambah Data Jabatan</h4>
      </div>
      <div class="widget-body">
        <div class="widget-main">
          <form class="form-horizontal" method="post" action="<?php echo base_url().'index.php/master/jabatan_act/tambah' ?>">
            <div class="form-group">
              <label class='col-sm-3 control-label no-padding-right' for='id'>ID</label>
              <div class='col-sm-9'>
                <input type='text' id='id' name="id" placeholder='ID' class='col-xs-10 col-sm-9' value="<?php echo $id_jabatan; ?>" readonly="" required="" />
              </div>
            </div>
            <div class="form-group">
              <label class='col-sm-3 control-label no-padding-right' for='nama'>Nama</label>
              <div class='col-sm-9'>
                <input type='text' id='nama' name="nama" placeholder='Nama' class='col-xs-10 col-sm-9' required="" />
              </div>
            </div>
            <div class="form-group">
              <label class='col-sm-3 control-label no-padding-right' for='kepala'>Kepala</label>
              <div class='col-sm-9'>
                <select id='kepala' name="kepala" placeholder='Kepala' class='col-xs-10 col-sm-9'>
                  <option></option>
                  <?php foreach ($jabatan as $j) { ?>
                    <option value="<?php echo $j->ID_JABATAN ?>"><?php echo $j->NAMA; ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class='col-sm-3 control-label no-padding-right' for='disposisi'>Disposisi</label>
              <div class='col-sm-9'>
                <select id='disposisi' name="disposisi" placeholder='Disposisi' class='col-xs-10 col-sm-9' required="">
                  <option value="0">Tidak</option>
                  <option value="1">Ya</option>
                </select>
              </div>
            </div>
            <div class="form-group">
							<div class="col-md-offset-3 col-md-9">
								<button class="btn btn-info" type="submit">
									<i class="ace-icon fa fa-check bigger-110"></i>
									Simpan
								</button>
								&nbsp; &nbsp; &nbsp;
								<button class="btn" type="reset">
									<i class="ace-icon fa fa-undo bigger-110"></i>
									Reset
								</button>
							</div>
						</div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-7">
    <div class="clearfix">
			<div class="pull-right tableTools-container"></div>
		</div>
		<div class="table-header">
			Daftar Jabatan
		</div>
    <table id="dynamic-table" class="table table-striped table-bordered table-hover">
      <thead>
        <tr>
          <th>No.</th>
          <th>Jabatan</th>
          <th>Kepala</th>
          <th>Disposisi</th>
          <th>Opsi</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no = 1;
        foreach($jabatan as $j) { ?>
        <tr>
          <td style="text-align: right;width: 10%;"><?php echo $no; ?>.</td>
          <td><?php echo $j->NAMA; ?></td>
          <td><?php echo empty($j->KEPALA)?"<center>-</center>":$j->KEPALA; ?></td>
          <td style="text-align: center"><?php echo $j->STATUS_DISPOSISI==1?'<i class="ace-icon fa fa-check"></i>':''; ?></td>
          <td style="text-align: center;width: 20%;">
            <div class="hidden-sm hidden-xs action-buttons">
  						<a class="green" href="#modal-edit" data-toggle="modal" role="button"
                onclick="edit('<?php echo $j->ID_JABATAN; ?>', '<?php echo $j->NAMA; ?>',
                  '<?php echo $j->ID_KEPALA; ?>', '<?php echo $j->STATUS_DISPOSISI; ?>')">
  							<i class="ace-icon fa fa-pencil bigger-130"></i>
  						</a>

  						<a class="red" href="<?php echo $j->ID_JABATAN!=1?base_url().'index.php/master/jabatan_act/hapus-'.$j->ID_JABATAN:'#'; ?>"
                onclick="return confirm('Anda yakin?');">
  							<i class="ace-icon fa fa-trash-o bigger-130"></i>
  						</a>
  					</div>
          </td>
        </tr>
        <?php $no++; } ?>
      </tbody>
    </table>
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
					Edit Jabatan
				</div>
			</div>
      <form class='form-horizontal' role='form' action='<?php echo base_url()."index.php/master/jabatan_act/ubah"; ?>' method='post'>
      <div class='modal-body no-padding'>
        <div class="form-group">
          <label class='col-sm-3 control-label no-padding-right' for='id'>ID</label>
          <div class='col-sm-9'>
            <input type='text' id='id-u' name="id-u" placeholder='ID' class='col-xs-10 col-sm-9' readonly="" required="" />
          </div>
        </div>
        <div class="form-group">
          <label class='col-sm-3 control-label no-padding-right' for='nama'>Nama</label>
          <div class='col-sm-9'>
            <input type='text' id='nama-u' name="nama-u" placeholder='Nama' class='col-xs-10 col-sm-9' required="" />
          </div>
        </div>
      </div>
      <div class="form-group">
        <label class='col-sm-3 control-label no-padding-right' for='kepala-u'>Kepala</label>
        <div class='col-sm-9'>
          <select id='kepala-u' name="kepala-u" placeholder='Kepala' class='col-xs-10 col-sm-9'>
            <option></option>
            <?php foreach ($jabatan as $j) { ?>
              <option value="<?php echo $j->ID_JABATAN ?>"><?php echo $j->NAMA; ?></option>
            <?php } ?>
          </select>
        </div>
      </div>
      <div class="form-group">
        <label class='col-sm-3 control-label no-padding-right' for='disposisi-u'>Disposisi</label>
        <div class='col-sm-9'>
          <select id='disposisi-u' name="disposisi-u" placeholder='Disposisi' class='col-xs-10 col-sm-9' required="">
            <option value="0">Tidak</option>
            <option value="1">Ya</option>
          </select>
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
    </div>
  </div>
</div>

<script type="text/javascript">
  function edit(id, nama, kepala, disposisi) {
    $('#id-u').val(id);
    $('#nama-u').val(nama);
    $('#kepala-u').val(kepala);
    $('#disposisi-u').val(disposisi);
  }
</script>
