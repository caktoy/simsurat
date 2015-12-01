<h1><?php echo $judul; ?></h1><hr>
<div class="row">
  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
    <div class="widget-box">
			<div class="widget-header">
				<h5 class="widget-title">Detil Surat</h5>
      </div>

      <div class="widget-body">
				<div class="widget-main">
					<form role="form" class="form-horizontal">
            <div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="no_surat">No. Surat</label>
							<div class="col-sm-9">
								<input type="text" id="no_surat" placeholder="No. Surat" class="form-control" disabled="" />
							</div>
						</div>
            <div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="tgl_masuk">Tanggal Masuk</label>
							<div class="col-sm-9">
								<input type="text" id="tgl_masuk" placeholder="Tanggal Masuk" class="form-control" disabled="" />
							</div>
						</div>
            <div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="perihal">Perihal</label>
							<div class="col-sm-9">
								<input type="text" id="perihal" placeholder="Perihal" class="form-control" disabled="" />
							</div>
						</div>
            <div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="tgl_surat">Tanggal Surat</label>
							<div class="col-sm-9">
								<input type="text" id="tgl_surat" placeholder="Tanggal Surat" class="form-control" disabled="" />
							</div>
						</div>
            <div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="dari">Dari</label>
							<div class="col-sm-9">
								<input type="text" id="dari" placeholder="Dari" class="form-control" disabled="" />
							</div>
						</div>
            <div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="jenis">Jenis</label>
							<div class="col-sm-9">
								<input type="text" id="jenis" placeholder="Jenis" class="form-control" disabled="" />
							</div>
						</div>
            <div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="asal">Asal Instansi</label>
							<div class="col-sm-9">
								<input type="text" id="asal" placeholder="Asal Instansi" class="form-control" disabled="" />
							</div>
						</div>
            <div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="keterangan">Keterangan</label>
							<div class="col-sm-9">
								<textarea id="keterangan" placeholder="Keterangan" class="form-control" disabled="" rows="3"></textarea>
							</div>
						</div>
          </form>
				</div>
			</div>
    </div>
  </div>

  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
    <div class="widget-box">
			<div class="widget-header">
				<h5 class="widget-title">Tujuan Disposisi</h5>
      </div>

      <div class="widget-body">
				<div class="widget-main">
          <form role="form" class="form-horizontal" method="post" action="">
            <div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="unit">Unit Kerja</label>
							<div class="col-sm-9">
								<select id="unit" class="form-control">
                  <option></option>
                  <?php foreach ($unit as $u) { ?>
                    <option value="<?php echo $u->ID_UNIT ?>"><?php echo $u->NAMA; ?></option>
                  <?php } ?>
                </select>
							</div>
						</div>
            <div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="Nota">Nota Disposisi</label>
							<div class="col-sm-9">
								<textarea id="nota" placeholder="Nota" class="form-control" rows="5"></textarea>
							</div>
						</div>
            <div class="form-group">
              <div class="col-md-offset-3 col-md-9">
								<button class="btn btn-info" type="button">
									<i class="ace-icon fa fa-check bigger-110"></i>Simpan
								</button>
                <button class="btn btn-default" type="button" onclick="javascrip:history.go(-1);">
									<i class="ace-icon fa fa-undo bigger-110"></i>Batal
								</button>
              </div>
						</div>
          </form>
				</div>
			</div>
    </div>
  </div>
</div>
