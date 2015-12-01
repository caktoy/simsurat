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
  <form class="form-inline" role="form">
    <label class="form-label" for="surat">Pilih Surat</label>
    <select id="surat" class="form-control">
      <?php $no = 1; foreach ($surat as $s) { ?>
      <option value="<?php echo $s->ID ?>">
        <?php echo date("d-m-Y", strtotime($s->TANGGAL_DISPOSISI))." | ".$s->NOMOR." - ".$s->JUDUL_KOP; ?>
      </option>
      <?php } ?>
    </select>
    <button type="button" class="btn btn-info btn-sm" id="lihat">
			<i class="ace-icon fa fa-eye bigger-110"></i>Lihat
		</button>
  </form>
</div>
<div class="col-md-12">
  <div class="clearfix">
    <div class="pull-right tableTools-container"></div>
  </div>
  <div class="table-header">
    Riwayat Disposisi
  </div>
  <table id="dynamic-table" class="table table-striped table-bordered table-hover">
    <thead>
      <tr>
        <th>No.</th>
        <th>Kop Surat</th>
        <th>Nomor Surat</th>
        <th>Dari</th>
        <th>Kepada</th>
        <th>Tanggal Surat</th>
        <th>Tanggal Disposisi</th>
      </tr>
    </thead>
    <tbody id="table-container">
    </tbody>
  </table>
</div>
<script type="text/javascript">
  $("#lihat").click(function(e) {
    var surat = $("#surat").val();
    $.ajax({
      url: '<?php echo base_url()."index.php/disposisi/cari_riwayat"; ?>',
      type: 'POST',
      data: {'surat': surat},
      success: function(result) {
        $("#table-container").html(result);
      },
      error: function(xhr, status, error) {
        console.log(error);
      }
    });
  });
</script>
