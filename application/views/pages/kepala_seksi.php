<?php
function isSelected($value1, $value2)
{
  return $value1==$value2?"selected":"";
}
?>
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
  <div class="col-sm-12">
    <div class="clearfix">
			<div class="pull-right tableTools-container"></div>
		</div>
		<div class="table-header">
			Daftar Kepala Seksi
		</div>
    <table id="dynamic-table" class="table table-striped table-bordered table-hover">
      <thead>
        <tr>
          <th>No.</th>
          <th>Unit Kerja</th>
          <th>Kepala Seksi</th>
          <th>NIP</th>
          <th>Opsi</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no = 1;
        foreach($kepala_seksi as $ks) { ?>
        <tr>
          <td style="text-align: right;width: 5%;"><?php echo $no; ?>.</td>
          <td><?php echo $ks->UNIT; ?></td>
          <td><?php echo !empty($ks->KEPALA)?$ks->KEPALA:"-"; ?></td>
          <td><?php echo !empty($ks->NIP)?$ks->NIP:"-"; ?></td>
          <td style="text-align: center;width: 10%;">
            <div class="hidden-sm hidden-xs action-buttons">
  						<a class="green" href="#modal-edit" data-toggle="modal" role="button"
                onclick="edit(<?php echo "'".$ks->ID_UNIT."', '".$ks->UNIT."', '".$ks->NIP."', '".$ks->KEPALA."'" ?>)">
  							<i class="ace-icon fa fa-pencil bigger-130"></i>
  						</a>

  						<a class="red" href="<?php echo base_url().'index.php/master/kepala_act/hapus-'.$ks->ID_UNIT; ?>"
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
					Pilih Kepala Seksi
				</div>
			</div>
      <form class='form-horizontal' role='form' action='<?php echo base_url()."index.php/master/kepala_act/ubah"; ?>' method='post'>
      <input type="hidden" name="unit" id="unit" required="" />
      <div class='modal-body no-padding'>
        <div class="form-group">
          <label class='col-sm-3 control-label no-padding-right' for='nama-unit'>Unit</label>
          <div class='col-sm-9'>
            <input type='text' id='nama-unit' name="nama-unit" placeholder='Unit'
              class='col-xs-10 col-sm-9' readonly="" />
          </div>
        </div>
        <div class="form-group">
          <label class='col-sm-3 control-label no-padding-right' for='pegawai'>NIP</label>
          <div class='col-sm-9'>
            <input type='text' id='pegawai' name="pegawai" placeholder='NIP'
              class='col-xs-10 col-sm-9' required="" />
          </div>
        </div>
        <div class="form-group">
          <label class='col-sm-3 control-label no-padding-right' for='kepala'>Nama</label>
          <div class='col-sm-9'>
            <input type='text' id='kepala' name="kepala" placeholder='Nama'
              class='col-xs-10 col-sm-9' readonly="" required="" />
          </div>
        </div>
      </div>
      <div class='modal-footer no-margin-top'>
        <button class='btn btn-sm btn-danger pull-left' data-dismiss='modal'>
          <i class='ace-icon fa fa-times'></i> Tutup
        </button>&nbsp;
        <button class='btn btn-primary btn-sm' type='submit' id="simpan">
          <i class='ace-icon fa fa-check'></i> Simpan
        </button>
      </div>
      </form>
    </div>
  </div>
</div>

<script type="text/javascript">
  function edit(unit, nama_unit, nip, nama_peg) {
    $('#unit').val(unit);
    $('#nama-unit').val(nama_unit);
    $('#pegawai').val(nip);
    $('#kepala').val(nama_peg);
  }
</script>
<script type="text/javascript">
  $(document).ready(function() {
    //$("#simpan").attr('disabled', 'true');
    $("#pegawai").change(function(e) {
      var nip = $(this).val();
      $.ajax({
        url: '<?php echo base_url()."index.php/master/cari_karyawan"; ?>',
        type: 'POST',
        data: {'id': nip},
        success: function(result) {
          $("#kepala").val(result);
          if (result != undefined) {
            //$("#simpan").attr('disabled', 'false');
          } else {
            //$("#simpan").attr('disabled', 'true');
          }
        },
        error: function(xhr, status, error) {
          console.log(error);
        }
      });
    });
  });
</script>
