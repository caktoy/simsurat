<h1><?php echo $judul; ?></h1><hr>
<form action="" method="post" class="form-horizontal">
  <div class="widget-box">
    <div class="widget-header widget-header-flat">
			<h4 class="widget-title">Detil Surat Masuk</h4>
		</div>
    <div class="widget-body">
  		<div class="widget-main">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label class='col-sm-4 control-label no-padding-right' for='id'>ID Surat</label>
              <div class='col-sm-8'>
                <input type='text' id='id' name="id" placeholder='ID Surat' class='form-control'
                  required="" disabled="" value="<?php echo $surat[0]->ID_SURAT; ?>" />
              </div>
            </div>
            <div class="form-group">
              <label class='col-sm-4 control-label no-padding-right' for='kop'>Judul Kop Surat</label>
              <div class='col-sm-8'>
                <input type='text' id='kop' name="kop" placeholder='Judul Kop Surat' class='form-control'
                  required="" disabled="" value="<?php echo $surat[0]->JUDUL_KOP; ?>" />
              </div>
            </div>
            <div class="form-group">
              <label class='col-sm-4 control-label no-padding-right' for='no'>Nomor Surat</label>
              <div class='col-sm-8'>
                <input type='text' id='no' name="no" placeholder='Nomor Surat' class='form-control'
                  required="" disabled="" value="<?php echo $surat[0]->NOMOR; ?>" />
              </div>
            </div>
            <div class="form-group">
              <label class='col-sm-4 control-label no-padding-right' for='tgl'>Tanggal Surat</label>
              <div class='col-sm-5'>
                <div class="input-group">
    							<input class="form-control date-picker" id="tgl" name="tgl" type="text"
                    data-date-format="dd-mm-yyyy" disabled=""
                    value="<?php echo date("d-m-Y", strtotime($surat[0]->TANGGAL)); ?>" />
    							<span class="input-group-addon">
    								<i class="fa fa-calendar bigger-110"></i>
    							</span>
    						</div>
              </div>
            </div>
            <div class="form-group">
              <label class='col-sm-4 control-label no-padding-right' for='hal'>Perihal</label>
              <div class='col-sm-8'>
                <input type='text' id='hal' name="hal" placeholder='Perihal' class='form-control'
                  required="" disabled="" value="<?php echo $surat[0]->PERIHAL; ?>" />
              </div>
            </div>
            <div class="form-group">
              <label class='col-sm-4 control-label no-padding-right' for='kepada'>Kepada</label>
              <div class='col-sm-8'>
                <input type='text' id='kepada' name="kepada" placeholder='Kepada' class='form-control'
                  required="" disabled="" value="<?php echo $surat[0]->KEPADA; ?>" />
              </div>
            </div>
            <div class="form-group">
              <label class='col-sm-4 control-label no-padding-right' for='asal'>Asal Instansi</label>
              <div class='col-sm-8'>
                <input type='text' id='asal' name="asal" placeholder='Asal Instansi' class='form-control'
                  required="" disabled="" value="<?php echo $surat[0]->ASAL_INSTANSI; ?>" />
              </div>
            </div>
            <!--<div class="form-group">
              <label class='col-sm-4 control-label no-padding-right' for='balasan'>Balasan Dari Surat</label>
              <div class='col-sm-8'>
                <div class="input-group">
    							<input class="form-control" id="balasan" placeholder="Cari" name="balasan" type="text"  />
    							<span class="input-group-btn">
    								<button type="button" class="btn btn-sm btn-default"><i class="glyphicon glyphicon-search bigger-110"></i></button>
    							</span>
    						</div>
              </div>
            </div>-->
            <div class="form-group">
              <label class='col-sm-4 control-label no-padding-right' for='tgl_masuk'>Tanggal Masuk Surat</label>
              <div class='col-sm-5'>
                <div class="input-group">
    							<input class="form-control date-picker" id="tgl_masuk" name="tgl_masuk" type="text"
                    data-date-format="dd-mm-yyyy" disabled=""
                    value="<?php echo date("d-m-Y", strtotime($surat[0]->TANGGAL_MASUK)); ?>" />
    							<span class="input-group-addon">
    								<i class="fa fa-calendar bigger-110"></i>
    							</span>
    						</div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label class='col-sm-4 control-label no-padding-right' for='media'>Media</label>
              <div class='col-sm-8'>
                <select id='media' name="media" class='form-control form-control' required="" disabled="">
                  <option></option>
                  <?php
                  function selected($val1, $val2) {
                    return $val1==$val2?"selected":"";
                  }
                  foreach ($media as $m) {
                    echo "<option value='".$m->ID_MEDIA."' ".
                      selected($m->ID_MEDIA, $surat[0]->ID_MEDIA).">".$m->NAMA."</option>";
                  } ?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class='col-sm-4 control-label no-padding-right' for='jenis'>Jenis Surat</label>
              <div class='col-sm-8'>
                <select id='jenis' name="jenis" class='form-control form-control' required="" disabled="">
                  <option></option>
                  <?php foreach ($jenis as $j) {
                    echo "<option value='".$j->ID_JENIS."' ".
                      selected($j->ID_JENIS, $surat[0]->ID_JENIS).">".$j->NAMA."</option>";
                  } ?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class='col-sm-4 control-label no-padding-right' for='inaktif'>Jadwal Inaktif</label>
              <div class='col-sm-8'>
                <input type='text' id='inaktif' name="inaktif" placeholder='DD-MM-YYYY' class='form-control'
                  required="" disabled="" value="<?php echo date("d-m-Y", strtotime($inaktif[0]->TANGGAL_INAKTIF)); ?>" />
              </div>
            </div>
            <div class="form-group">
              <label class='col-sm-4 control-label no-padding-right' for='retensi'>Jadwal Retensi</label>
              <div class='col-sm-8'>
                <input type='text' id='retensi' name="retensi" placeholder='DD-MM-YYYY' class='form-control'
                  required="" disabled="" value="<?php echo date("d-m-Y", strtotime($retensi[0]->TANGGAL_RETENSI)); ?>" />
              </div>
            </div>
            <div class="form-group">
              <label class='col-sm-4 control-label no-padding-right' for='lokasi'>Lokasi Penyimpanan</label>
              <div class='col-sm-8'>
                <select id='lokasi' name="lokasi" class='form-control form-control' required="" disabled="">
                  <option></option>
                  <?php foreach ($lokasi as $l) {
                    echo "<option value='".$l->ID_LOKASI."' ".
                      selected($l->ID_LOKASI, $surat[0]->ID_LOKASI).">".$l->NAMA."</option>";
                  } ?></select>
              </div>
            </div>
            <div class="form-group">
              <label class='col-sm-4 control-label no-padding-right' for='ket'>Keterangan</label>
              <div class='col-sm-8'>
                <textarea id='ket' name="ket" placeholder='Keterangan' class='form-control'
                  rows="6" disabled=""><?php echo $arsip[0]->KETERANGAN; ?></textarea>
              </div>
            </div>
            <div class="form-group">
  						<div class="col-md-offset-4 col-md-8">
                <?php echo anchor("surat/keluar_list", "Kembali"); ?>
  							<!--<button class="btn btn-info" type="button" onclick="javascript:history.go(-1);">
  								<i class="ace-icon glyphicon glyphicon-chevron-left bigger-110"></i>
  								Kembali
  							</button>-->
  						</div>
  					</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>

<div class="widget-box">
  <div class="widget-header widget-header-flat">
    <h4 class="widget-title">Daftar Arsip Surat</h4>
  </div>
  <div class="widget-body">
    <div class="widget-main">
      <ol>
        <?php
        $idx = 1;
        foreach ($upload as $u) {
          $url_segment = explode("/", $u->PATH);
          echo "<li>".$url_segment[6]." <br>
            <a href='".$u->PATH."' target='_blank'>[Lihat]</a></li>";
          $idx++;
        }
        ?>
      </ol>
    </div>
  </div>
</div>
