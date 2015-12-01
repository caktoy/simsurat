<h1><?php echo $judul; ?></h1><hr>
<?php if (isset($_SESSION['pesan'])) { ?>
  <div class="alert alert-block alert-info" role="alert">
    <button type="button" class="close" data-dismiss="alert">
      <i class="ace-icon fa fa-times"></i>
    </button>
    <?php echo $this->session->flashdata('pesan'); ?>
  </div>
<?php } ?>
<form action="<?php echo base_url().'index.php/peminjaman/pinjam' ?>" method="post" class="form-horizontal">
  <div class="col-md-12">
    <div class="clearfix">
      <div class="pull-right tableTools-container"></div>
    </div>
    <div class="table-header">
      Daftar Arsip
    </div>
    <table id="dynamic-table" class="table table-striped table-bordered table-hover">
      <thead>
        <tr>
          <th>No. Surat</th>
          <th>Asal Instansi</th>
          <th>Jenis Surat</th>
          <th>Tanggal Masuk</th>
          <th>Perihal</th>
          <th>Lokasi</th>
          <th>Pilih</th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach($surat as $s) { ?>
        <tr>
          <td><?php echo $s->NOMOR; ?></td>
          <td><?php echo $s->ASAL_INSTANSI; ?></td>
          <td><?php echo $s->JENIS; ?></td>
          <td><?php echo strftime("%d %B %Y", strtotime($s->TANGGAL_MASUK)); ?></td>
          <td><?php echo $s->PERIHAL; ?></td>
          <td><?php echo $s->LOKASI; ?></td>
          <td style="text-align: center;width: 20%;">
            <input type="checkbox" id="ck<?php echo $s->ID_SURAT ?>" name="ck-arsip[]"
              value="<?php echo $s->ID_SURAT ?>" />
          </td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>

  <div class="col-md-12">
    <div class="widget-box">
      <div class="widget-header widget-header-flat">
        <h4 class="widget-title smaller">Peminjaman</h4>
      </div>
      <div class="widget-body">
        <div class="widget-main">
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label class='col-sm-4 control-label no-padding-right' for='nip'>Peminjam</label>
                <div class='col-sm-8'>
                  <input type='text' id='nip' name="nip" class='form-control'
                    value="<?php echo $this->session->userdata('nip'); ?>" required="" readonly="" />
                </div>
              </div>
              <div class="form-group">
                <label class='col-sm-4 control-label no-padding-right' for='kembali'>Tanggal Kembali</label>
                <div class='col-sm-8'>
                  <input type='text' id='kembali' name="kembali" placeholder='DD-MM-YYYY'
                    class='form-control' value="<?php echo $tanggal_kembali; ?>" required="" readonly="" />
                </div>
              </div>
            </div>
            <div class="col-md-8">
              <div class="form-group">
                <label class='col-sm-2 control-label no-padding-right' for='ket'>Keterangan</label>
                <div class='col-sm-10'>
                  <textarea id='ket' name="ket" placeholder='Keterangan' class='form-control' rows="4"></textarea>
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
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>
