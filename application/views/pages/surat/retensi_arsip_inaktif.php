<h1><?php echo $judul; ?></h1><hr>
<div class="col-md-12">
  <div class="clearfix">
    <div class="pull-right tableTools-container"></div>
  </div>
  <div class="table-header">
    Daftar <?php echo $judul; ?>
  </div>
  <table id="dynamic-table" class="table table-striped table-bordered table-hover">
    <thead>
      <tr>
        <th>No.</th>
        <th>No. Surat</th>
        <th>Asal Instansi</th>
        <th>Tanggal</th>
        <th>Perihal</th>
        <th>Jenis Surat</th>
        <th>Lokasi</th>
        <th>Status Surat</th>
        <th>Opsi</th>
      </tr>
    </thead>
    <tbody>
      <?php $no = 1; foreach ($surat as $s) { ?>
      <tr>
        <td style="text-align: right;width: 5%;"><?php echo $no.'.'; ?></td>
        <td><?php echo $s->NOMOR; ?></td>
        <td><?php echo $s->ASAL_INSTANSI; ?></td>
        <td><?php echo $s->TANGGAL; ?></td>
        <td><?php echo $s->PERIHAL; ?></td>
        <td><?php echo $s->JENIS; ?></td>
        <td><?php echo $s->LOKASI; ?></td>
        <td style="text-align: center;width: 10%;">
          <?php echo $s->STATUS==0?
            '<span class="label label-success">Aktif</span>'
            :
            '<span class="label label-danger">Inaktif</span>'; ?>
        </td>
        <td style="text-align: center;width: 100px;">
          <div class="hidden-sm hidden-xs action-buttons">
            <a class="green" href="javascript:void(0);" onclick="aktifkan('<?php echo $s->ID; ?>')">
              <i class="ace-icon fa fa-check bigger-130"></i> Aktifkan
            </a>
          </div>
        </td>
      </tr>
      <?php $no++; } ?>
    </tbody>
  </table>
</div>
<script type="text/javascript">
  function aktifkan(id) {
    $.ajax({
      url: '<?php echo base_url()."index.php/retensi/reactivate"; ?>',
      type: 'POST',
      data: {'id': id},
      success: function(result) {
        location.reload();
      },
      error: function(xhr, status, error) {
        alert("Gagal mengaktifkan kembali arsip surat.\nSilahkan menghubungi Administrator.");
      }
    });
  }
</script>
