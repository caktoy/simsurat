<h1><?php echo $judul; ?></h1><hr>
<div class="col-md-12">
  <div class="clearfix">
    <div class="pull-right tableTools-container"></div>
  </div>
  <div class="table-header">
    Daftar Arsip Masuk
  </div>
  <table id="dynamic-table" class="table table-striped table-bordered table-hover">
    <thead>
      <tr>
        <th>No.</th>
        <th>Asal Instansi</th>
        <th>Perihal</th>
        <th>Dari</th>
        <th>Kepada</th>
        <th>Tanggal Arsip</th>
        <th>Tanggal Masuk</th>
        <th>Opsi</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $no = 1;
      foreach($surat as $s) { ?>
      <tr>
        <td style="text-align: right;width: 5%;"><?php echo $no; ?>.</td>
        <td><?php echo $s->ASAL_INSTANSI; ?></td>
        <td><?php echo $s->PERIHAL; ?></td>
        <td><?php echo $s->DARI; ?></td>
        <td><?php echo $s->KEPADA; ?></td>
        <td><?php echo date("d-m-Y", strtotime($s->TANGGAL)); ?></td>
        <td><?php echo date("d-m-Y", strtotime($s->TANGGAL_MASUK)); ?></td>
        <td style="text-align: center;width: 10%;">
          <div class="hidden-sm hidden-xs action-buttons">
            <a class="blue" href="<?php echo base_url().'index.php/surat/masuk_detil/'.$s->ID_SURAT; ?>">
              <i class="ace-icon fa fa-eye bigger-130"></i>
            </a>

            <a class="green" href="<?php echo base_url().'index.php/surat/masuk_ubah/'.$s->ID_SURAT; ?>">
              <i class="ace-icon fa fa-pencil bigger-130"></i>
            </a>

            <a class="red" href="<?php echo base_url().'index.php/surat/masuk_hapus/'.$s->ID_SURAT; ?>"
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
