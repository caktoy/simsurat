<h1><?php echo $judul; ?></h1><hr>
<?php
function selected_val($val1, $val2) {
  echo $val1==$val2?"selected":"";
}
?>
<div class="col-sm-12">
  <div class="widget-box">
    <div class="widget-header widget-header-flat">
      <h4 class="widget-title smaller">Form Data Pegawai</h4>
      <div class="widget-toolbar">
				<a href="#" data-action="collapse">
					<i class="ace-icon fa fa-chevron-up"></i>
				</a>
			</div>
    </div>
    <div class="widget-body">
      <div class="widget-main">
        <form class="form-horizontal" method="post" action="<?php echo base_url().'index.php/master/pegawai_act/ubah' ?>">
          <div class='form-group'>
            <label class='col-sm-2 control-label no-padding-right' for='nip'>NIP</label>
            <div class='col-sm-5'>
              <input type='text' id='nip' name='nip' placeholder='NIP' class='col-xs-10 col-sm-9' readonly="" required=""
              value="<?php echo $pegawai[0]->NIP; ?>" />
            </div>
          </div>
          <div class='form-group'>
            <label class='col-sm-2 control-label no-padding-right' for='nama'>Nama</label>
            <div class='col-sm-6'>
              <input type='text' id='nama' name="nama" placeholder='Nama' class='col-xs-10 col-sm-12' required=""
              value="<?php echo $pegawai[0]->NAMA; ?>"/>
            </div>
          </div>
          <div class='form-group'>
            <label class='col-sm-2 control-label no-padding-right' for='tgl_l'>Tanggal Lahir</label>
            <div class='col-sm-3'>
              <div class="input-group">
  							<input class="form-control date-picker" id="tgl_l" name="tgl_l" type="text" data-date-format="dd-mm-yyyy"
                value="<?php echo date("d-m-Y", strtotime($pegawai[0]->TANGGAL_LAHIR)); ?>" />
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
  							<input class="form-control date-picker" id="tgl_p" name="tgl_p" type="text" data-date-format="dd-mm-yyyy"
                value="<?php echo date("d-m-Y", strtotime($pegawai[0]->TANGGAL_PENGANGKATAN)); ?>" />
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
                <option value="L" <?php selected_val('L', $pegawai[0]->JENIS_KELAMIN) ?>>Laki-laki</option>
                <option value="P" <?php selected_val('P', $pegawai[0]->JENIS_KELAMIN) ?>>Perempuan</option>
              </select>
            </div>
          </div>
          <div class='form-group'>
            <label class='col-sm-2 control-label no-padding-right' for='unit'>Unit Kerja</label>
            <div class='col-sm-7'>
              <select id="unit" name="unit" class="col-xs-10 col-sm-9" required="">
              <?php foreach($unit_kerja as $uk) { ?>
                <option value="<?php echo $uk->ID_UNIT; ?>" <?php selected_val($uk->ID_UNIT, $pegawai[0]->ID_UNIT) ?>>
                  <?php echo $uk->NAMA; ?>
                </option>
              <?php } ?>
              </select>
            </div>
          </div>
          <div class='form-group'>
            <label class='col-sm-2 control-label no-padding-right' for='jabatan'>Jabatan</label>
            <div class='col-sm-7'>
              <select id="jabatan" name="jabatan" class="col-xs-10 col-sm-9" required="">
                <option></option>
              <?php foreach($jabatan as $j) { ?>
                <option value="<?php echo $j->ID_JABATAN; ?>" <?php selected_val($j->ID_JABATAN, $pegawai[0]->ID_JABATAN) ?>>
                  <?php echo $j->NAMA; ?>
                </option>
              <?php } ?>
              </select>
            </div>
          </div>
          <div class='form-group'>
            <label class='col-sm-2 control-label no-padding-right' for='alamat'>Alamat</label>
            <div class='col-sm-6'>
              <textarea name="alamat" id="alamat" placeholder="Alamat" class="col-xs-10 col-sm-12"><?php echo $pegawai[0]->ALAMAT; ?></textarea>
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
              &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
              <button class="btn btn-danger" type="button" onclick="javascript:history.go(-1);">
								<i class="ace-icon glyphicon glyphicon-remove bigger-110"></i>
								Batal
							</button>
						</div>
					</div>
        </form>
      </div>
    </div>
  </div>
</div>
