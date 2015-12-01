<h1><?php echo $judul; ?></h1><hr>
<?php if (isset($_SESSION['pesan'])) { ?>
  <div class="alert alert-block alert-info" role="alert">
    <button type="button" class="close" data-dismiss="alert">
      <i class="ace-icon fa fa-times"></i>
    </button>
    <?php echo $this->session->flashdata('pesan'); ?>
  </div>
<?php } ?>
<div class="col-sm-12">
  <div class="widget-box">
    <div class="widget-header widget-header-flat">
      <h4 class="widget-title smaller">Tambah Data Pegawai</h4>
      <div class="widget-toolbar">
				<a href="#" data-action="collapse">
					<i class="ace-icon fa fa-chevron-up"></i>
				</a>
			</div>
    </div>
    <div class="widget-body">
      <div class="widget-main">
        <form class="form-horizontal" method="post" action="<?php echo base_url().'index.php/master/pegawai_act/tambah' ?>">
          <div class='form-group'>
            <label class='col-sm-2 control-label no-padding-right' for='nip'>NIP</label>
            <div class='col-sm-5'>
              <input type='text' id='nip' name='nip' placeholder='NIP' class='col-xs-10 col-sm-9' readonly="" required="" />
            </div>
          </div>
          <div class='form-group'>
            <label class='col-sm-2 control-label no-padding-right' for='nama'>Nama</label>
            <div class='col-sm-6'>
              <input type='text' id='nama' name="nama" placeholder='Nama' class='col-xs-10 col-sm-12' required="" />
            </div>
          </div>
          <div class='form-group'>
            <label class='col-sm-2 control-label no-padding-right' for='tgl_l'>Tanggal Lahir</label>
            <div class='col-sm-3'>
              <div class="input-group">
  							<input class="form-control date-picker" id="tgl_l" name="tgl_l" type="text" data-date-format="dd-mm-yyyy" value="<?php echo date('d-m-Y') ?>" />
  							<span class="input-group-addon">
  								<i class="fa fa-calendar bigger-110"></i>
  							</span>
  						</div>
            </div>
          </div>
          <div class='form-group'>
            <label class='col-sm-2 control-label no-padding-right' for='tgl_p'>Tanggal Pengangkatan</label>
            <div class='col-sm-3'>
              <div class="input-group">
  							<input class="form-control date-picker" id="tgl_p" name="tgl_p" type="text" data-date-format="dd-mm-yyyy" value="<?php echo date('d-m-Y') ?>" />
  							<span class="input-group-addon">
  								<i class="fa fa-calendar bigger-110"></i>
  							</span>
  						</div>
            </div>
          </div>
          <div class='form-group'>
            <label class='col-sm-2 control-label no-padding-right' for='jk'>Jenis Kelamin</label>
            <div class='col-sm-4'>
              <select name="jk" id='jk' class='col-xs-10 col-sm-6'>
                <option value="L">Laki-laki</option>
                <option value="P">Perempuan</option>
              </select>
            </div>
          </div>
          <div class='form-group'>
            <label class='col-sm-2 control-label no-padding-right' for='unit'>Unit Kerja</label>
            <div class='col-sm-7'>
              <select id="unit" name="unit" class="col-xs-10 col-sm-9" required="">
              <?php foreach($unit_kerja as $uk) { ?>
                <option value="<?php echo $uk->ID_UNIT; ?>"><?php echo $uk->NAMA; ?></option>
              <?php } ?>
              </select>
            </div>
          </div>
          <div class='form-group'>
            <label class='col-sm-2 control-label no-padding-right' for='jabatan'>Jabatan</label>
            <div class='col-sm-7'>
              <select id="jabatan" name="jabatan" class="col-xs-10 col-sm-9" required="">
              <?php foreach($jabatan as $j) { ?>
                <option value="<?php echo $j->ID_JABATAN; ?>"><?php echo $j->NAMA; ?></option>
              <?php } ?>
              </select>
            </div>
          </div>
          <div class='form-group'>
            <label class='col-sm-2 control-label no-padding-right' for='alamat'>Alamat</label>
            <div class='col-sm-6'>
              <textarea name="alamat" id="alamat" placeholder="Alamat" class="col-xs-10 col-sm-12"></textarea>
            </div>
          </div>
          <div class="form-group">
						<div class="col-md-offset-2 col-md-10">
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
<div class="col-sm-12">
  <div class="clearfix">
		<div class="pull-right tableTools-container"></div>
	</div>
	<div class="table-header">
		Daftar Pegawai
	</div>
  <table id="dynamic-table" class="table table-striped table-bordered table-hover">
    <thead>
      <tr>
        <th>NIP</th>
        <th>Nama</th>
        <th>Jenis Kelamin</th>
        <th>Jabatan</th>
        <th>Unit Kerja</th>
        <th>Alamat</th>
        <th>Opsi</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($pegawai as $k) { ?>
      <tr>
        <td><?php echo $k->NIP; ?></td>
        <td><?php echo $k->NAMA; ?></td>
        <td><?php echo $k->JENIS_KELAMIN=='L'?"Laki-laki":"Perempuan"; ?></td>
        <td><?php echo $k->JABATAN; ?></td>
        <td><?php echo $k->UNIT_KERJA; ?></td>
        <td><?php echo $k->ALAMAT; ?></td>
        <td style="text-align: center;">
          <div class="hidden-sm hidden-xs action-buttons">
						<a class="green" href="<?php echo base_url().'index.php/master/pegawai_edit/'.$k->NIP; ?>" data-toggle="modal" role="button">
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

<script type="text/javascript">
  function gen_id(tgl_l, tgl_p, jk) {
    $.ajax({
      url: '<?php echo base_url()."index.php/master/gen_id_peg"; ?>',
      type: 'POST',
      data: {'tgl_l': tgl_l, 'tgl_p': tgl_p, 'jk': jk},
      success: function(result) {
        $('#nip').val(result);
      },
      error: function(xhr, status, error) {
        console.log(error);
      }
    });
  }
</script>
<script type="text/javascript">
  $(document).ready(function() {
    var tgl_l = $('#tgl_l').val();
    var tgl_p = $('#tgl_p').val();
    var jk = $('#jk').val();
    gen_id(tgl_l, tgl_p, jk);

    $('#tgl_l').change(function() {
      var tgl_l = $(this).val();
      var tgl_p = $('#tgl_p').val();
      var jk = $('#jk').val();
      gen_id(tgl_l, tgl_p, jk);
    });
    $('#tgl_p').change(function() {
      var tgl_l = $('#tgl_l').val();
      var tgl_p = $(this).val();
      var jk = $('#jk').val();
      gen_id(tgl_l, tgl_p, jk);
    });
    $('#jk').change(function() {
      var tgl_l = $('#tgl_l').val();
      var tgl_p = $('#tgl_p').val();
      var jk = $(this).val();
      gen_id(tgl_l, tgl_p, jk);
    });
  });
</script>
