<?php $no = 1; foreach ($surat as $s) { ?>
  <tr>
    <td style="width: 5%;text-align: right;"><?php echo $no; ?>.</td>
    <td><?php echo $s->JUDUL_KOP; ?></td>
    <td><?php echo $s->NOMOR; ?></td>
    <td><?php echo $s->DARI; ?></td>
    <td><?php echo $s->KEPADA; ?></td>
    <td><?php echo date("d-m-Y", strtotime($s->TANGGAL_SURAT)); ?></td>
    <td><?php echo date("d-m-Y", strtotime($s->TANGGAL_DISPOSISI)); ?></td>
  </tr>
<?php $no++; } ?>
