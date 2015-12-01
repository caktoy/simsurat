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
  <div class="clearfix">
    <div class="pull-right tableTools-container"></div>
  </div>
  <div class="table-header">
    Konfirmasi Peminjaman
  </div>
  <table id="dynamic-table" class="table table-striped table-bordered table-hover">
    <thead>
      <tr>
        <th>No.</th>
        <th>Peminjam</th>
        <th>Surat</th>
        <th>Keperluan</th>
        <th>Tanggal Pinjam</th>
        <th>Tanggal Kembali</th>
        <th>Status</th>
        <th>Opsi</th>
      </tr>
    </thead>
    <tbody>
      <?php $no = 1; foreach ($pinjam as $p) { ?>
        <tr>
          <td style="width: 5%; text-align: right;"><?php echo $no."."; ?></td>
          <td><?php echo $p->NAMA; ?></td>
          <td><?php echo $p->NOMOR; ?></td>
          <td><?php echo $p->KEPERLUAN; ?></td>
          <td><?php echo date("d-m-Y", strtotime($p->TANGGAL_PINJAM)); ?></td>
          <td><?php echo date("d-m-Y", strtotime($p->TANGGAL_KEMBALI)); ?></td>
          <td style="text-align: center;">
            <span class="label <?php echo label($p->STATUS_PINJAM); ?>">
              <?php echo ucfirst($p->STATUS_PINJAM); ?>
            </span>
          </td>
          <td style="text-align: center;"><?php echo action($p->ID, $p->STATUS_PINJAM); ?></td>
        </tr>
      <?php $no++; } ?>
    </tbody>
  </table>
</div>
<!-- fungsi-fungsi php -->
<?php
function label($value)
{
  switch ($value) {
    case 'menunggu':return "label-warning";break;
    case 'pinjam':return "label-info";break;
    case 'telat':return "label-danger";break;
    case 'kembali':return "label-success";break;
    default:return "";break;
  }
}

function action($id, $value)
{
  switch ($value) {
    case 'menunggu':return anchor("/peminjaman/confirm/".$id, "Konfimasi", array("class" => "btn btn-minier btn-warning"));break;
    case 'pinjam':return anchor("/peminjaman/back/".$id, "Kembali", array("class" => "btn btn-minier btn-info"));break;
    case 'telat':
      return anchor("/peminjaman/notify/".$id, "<i class='ace-icon fa fa-bell bigger-100'></i>", array("class" => "btn btn-minier btn-danger"))." ".
        anchor("/peminjaman/back/".$id, "Kembali", array("class" => "btn btn-minier btn-info"));;
      break;
    case 'kembali':return "<span class='green'><i class='ace-icon glyphicon glyphicon-ok bigger-130'></i> Sukses</span>";break;
    default:return "";break;
  }
}
?>
