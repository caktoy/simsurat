<h1><?php echo $judul; ?></h1><hr>
<?php if (isset($_SESSION['pesan'])) { ?>
  <div class="alert alert-block alert-info" role="alert">
    <button type="button" class="close" data-dismiss="alert">
      <i class="ace-icon fa fa-times"></i>
    </button>
    <?php echo $this->session->flashdata('pesan'); ?>
  </div>
<?php } ?>

<div class="col-md-12">
  <div class="control-group">
    <label class="control-label bolder blue">Status Disposisi:</label>

    <div class="checkbox">
  		<label>
  			<input name="form-field-checkbox" type="checkbox" class="ace" id="sudah" />
  			<span class="lbl"> Sudah Terdisposisi</span>
  		</label>
  	</div>

    <div class="checkbox">
  		<label>
  			<input name="form-field-checkbox" type="checkbox" class="ace" id="belum" />
  			<span class="lbl"> Belum Terdisposisi</span>
  		</label>
  	</div>
  </div>
</div>

<div class="col-md-12">
  <div class="clearfix">
    <div class="pull-right tableTools-container"></div>
  </div>
  <div class="table-header">
    Daftar Arsip Surat
  </div>
  <table id="dynamic-table" class="table table-striped table-bordered table-hover">
    <thead>
      <tr>
        <th>No.</th>
        <th>Kop Surat</th>
        <th>Nomor Surat</th>
        <th>Tanggal Surat</th>
        <th>Lihat Arsip</th>
        <th>Opsi</th>
      </tr>
    </thead>
    <tbody id="tabel-data">
      <?php $no = 1; foreach ($surat as $s) { ?>
        <tr>
          <td style="width: 5%;text-align: right;"><?php echo $no; ?>.</td>
          <td><?php echo $s->JUDUL_KOP; ?></td>
          <td><?php echo $s->NOMOR; ?></td>
          <td><?php echo date("d-m-Y", strtotime($s->TANGGAL_SURAT)); ?></td>
          <td style="text-align: center;width: 10%;">
            <div class="hidden-sm hidden-xs action-buttons">
              <a class="green" href="#">
                <i class="ace-icon fa fa-folder-open-o bigger-130"></i>
              </a>
            </div>
          </td>
          <td style="text-align: center;width: 10%;">
            <div class="hidden-sm hidden-xs action-buttons">
              <a class="green" href="#">
                <i class="ace-icon fa fa-exchange bigger-130"></i>
              </a>
            </div>
          </td>
        </tr>
      <?php $no++; } ?>
    </tbody>
  </table>
</div>

<script type="text/javascript">
  $(document).ready(function() {
    $("#sudah").attr('checked', 'true');
    $("#belum").attr('checked', 'true');
    var sudah = $("#sudah").val();
    var belum = $("#belum").val();
  });
</script>
