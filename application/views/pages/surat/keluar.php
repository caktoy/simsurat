<h1><?php echo $judul; ?></h1><hr>
<?php if (isset($_SESSION['pesan'])) { ?>
  <div class="alert alert-block alert-info" role="alert">
    <button type="button" class="close" data-dismiss="alert">
      <i class="ace-icon fa fa-times"></i>
    </button>
    <?php echo $this->session->flashdata('pesan'); ?>
  </div>
<?php } ?>
<?php echo form_open_multipart('surat/simpan_keluar', array('class' => 'form-horizontal')); ?>
  <div class="widget-box">
    <div class="widget-header widget-header-flat">
			<h4 class="widget-title">Form Surat Keluar</h4>
		</div>
    <div class="widget-body">
  		<div class="widget-main">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label class='col-sm-4 control-label no-padding-right' for='id'>ID Surat</label>
              <div class='col-sm-8'>
                <input type='text' id='id' name="id" placeholder='ID Surat'
                  class='form-control' value="<?php echo $id; ?>" required="" readonly="" />
              </div>
            </div>
            <div class="form-group">
              <label class='col-sm-4 control-label no-padding-right' for='kop'>Judul Kop Surat</label>
              <div class='col-sm-8'>
                <input type='text' id='kop' name="kop" placeholder='Judul Kop Surat' class='form-control'
                  required="" autofocus="" />
              </div>
            </div>
            <div class="form-group">
              <label class='col-sm-4 control-label no-padding-right' for='no'>Nomor Surat</label>
              <div class='col-sm-8'>
                <input type='text' id='no' name="no" placeholder='Nomor Surat' class='form-control'
                  value="<?php echo "S-".$no."/WKN.8/KNL.01/".date("Y"); ?>" required="" readonly="" />
              </div>
            </div>
            <div class="form-group">
              <label class='col-sm-4 control-label no-padding-right' for='tgl'>Tanggal Surat</label>
              <div class='col-sm-5'>
                <div class="input-group">
    							<input class="form-control date-picker" id="tgl" name="tgl" type="text"
                  data-date-format="dd-mm-yyyy" value="<?php echo date('d-m-Y') ?>" />
    							<span class="input-group-addon">
    								<i class="fa fa-calendar bigger-110"></i>
    							</span>
    						</div>
              </div>
            </div>
            <div class="form-group">
              <label class='col-sm-4 control-label no-padding-right' for='hal'>Perihal</label>
              <div class='col-sm-8'>
                <input type='text' id='hal' name="hal" placeholder='Perihal' class='form-control' required="" />
              </div>
            </div>
            <div class="form-group">
              <label class='col-sm-4 control-label no-padding-right' for='dari'>Dari</label>
              <div class='col-sm-8'>
                <input type='text' id='dari' name="dari" placeholder='Dari' class='form-control' required="" />
              </div>
            </div>
            <div class="form-group">
              <label class='col-sm-4 control-label no-padding-right' for='kepada'>Kepada</label>
              <div class='col-sm-8'>
                <input type='text' id='kepada' name="kepada" placeholder='Kepada' class='form-control' required="" />
              </div>
            </div>
            <div class="form-group">
              <label class='col-sm-4 control-label no-padding-right' for='asal'>Asal Instansi</label>
              <div class='col-sm-8'>
                <input type='text' id='asal' name="asal" placeholder='Asal Instansi' class='form-control' required="" />
              </div>
            </div>
            <!--<div class="form-group">
              <label class='col-sm-4 control-label no-padding-right' for='balasan'>Balasan Dari Surat</label>
              <div class='col-sm-8'>
                <div class="input-group">
    							<input class="form-control" id="balasan" placeholder="Cari" name="balasan" type="text" />
    							<span class="input-group-btn">
    								<button type="button" class="btn btn-sm btn-default"><i class="glyphicon glyphicon-search bigger-110"></i></button>
    							</span>
    						</div>
              </div>
            </div>-->
            <!--<div class="form-group">
              <label class='col-sm-4 control-label no-padding-right' for='tgl_masuk'>Tanggal Masuk Surat</label>
              <div class='col-sm-5'>
                <div class="input-group">
    							<input class="form-control date-picker" id="tgl_masuk" name="tgl_masuk" type="text"
                  data-date-format="dd-mm-yyyy" value="<?php //echo date('d-m-Y') ?>" />
    							<span class="input-group-addon">
    								<i class="fa fa-calendar bigger-110"></i>
    							</span>
    						</div>
              </div>
            </div>-->
            <div class="form-group">
              <label class='col-sm-4 control-label no-padding-right' for='surat'>Unggah Surat</label>
              <div class='col-sm-8'>
                <input type='file' multiple="" id='surat' name="surat[]" class='form-control' required="" />
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label class='col-sm-4 control-label no-padding-right' for='media'>Media</label>
              <div class='col-sm-8'>
                <select id='media' name="media" class='form-control form-control' required="">
                  <option></option>
                  <?php foreach ($media as $m) {
                    echo "<option value='".$m->ID_MEDIA."'>".$m->NAMA."</option>";
                  } ?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class='col-sm-4 control-label no-padding-right' for='jenis'>Jenis Surat</label>
              <div class='col-sm-8'>
                <select id='jenis' name="jenis" class='form-control form-control' required="">
                  <option></option>
                  <?php foreach ($jenis as $j) {
                    echo "<option value='".$j->ID_JENIS."'>".$j->NAMA."</option>";
                  } ?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class='col-sm-4 control-label no-padding-right' for='inaktif'>Jadwal Inaktif</label>
              <div class='col-sm-8'>
                <input type='text' id='inaktif' name="inaktif" placeholder='DD-MM-YYYY' class='form-control' required="" readonly="" />
              </div>
            </div>
            <div class="form-group">
              <label class='col-sm-4 control-label no-padding-right' for='retensi'>Jadwal Retensi</label>
              <div class='col-sm-8'>
                <input type='text' id='retensi' name="retensi" placeholder='DD-MM-YYYY' class='form-control' required="" readonly="" />
              </div>
            </div>
            <div class="form-group">
              <label class='col-sm-4 control-label no-padding-right' for='lokasi'>Lokasi Penyimpanan</label>
              <div class='col-sm-8'>
                <select id='lokasi' name="lokasi" class='form-control form-control' required="">
                  <option></option>
                  <?php foreach ($lokasi as $l) {
                    echo "<option value='".$l->ID_LOKASI."'>".$l->NAMA."</option>";
                  } ?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class='col-sm-4 control-label no-padding-right' for='ket'>Keterangan</label>
              <div class='col-sm-8'>
                <textarea id='ket' name="ket" placeholder='Keterangan' class='form-control' rows="9"></textarea>
              </div>
            </div>
            <div class="form-group">
  						<div class="col-md-offset-4 col-md-8">
                <?php echo anchor('surat/keluar_list', "Lihat Data"); ?>
                <!--<a href="<?php //echo base_url().'index.php/surat/keluar_list'; ?>">Lihat Data</a>-->
  							<button class="btn btn-info pull-right" type="submit">
  								<i class="ace-icon fa fa-check bigger-110"></i>
  								Simpan
  							</button>
  						</div>
  					</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>

<script type="text/javascript">
$(document).ready(function() {
  $('#jenis').change(function(event) {
    var tgl_masuk = $('#tgl').val();
    var jenis = $(this).val();
    // ambil masa aktif surat
    $.ajax({
      url: '<?php echo base_url()."index.php/surat/jadwal_inaktif/"; ?>' + jenis + "/" + tgl_masuk,
      type: 'GET',
      success: function(result) {
        $('#inaktif').val(result);
      },
      error: function(xhr, status, error) {
        console.error(error);
      }
    });
    // ambil masa retensi surat
    $.ajax({
      url: '<?php echo base_url()."index.php/surat/jadwal_retensi/"; ?>' + jenis  + "/" + tgl_masuk,
      type: 'GET',
      success: function(result) {
        $('#retensi').val(result);
      },
      error: function(xhr, status, error) {
        console.error(error);
      }
    });
  });
});
</script>
