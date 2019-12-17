<?php
$objek = new JenisModel();
$ar_jenis = $objek->getAll();
$ar_status = ['Disetujui', 'Belum'];
?>
<form>
  <div class="form-group row">
    <label for="nik" class="col-5 col-form-label">NIK</label> 
    <div class="col-7">
      <input id="nik" name="nik" type="text" class="form-control" required="required">
    </div>
  </div>
  <div class="form-group row">
    <label for="jenis" class="col-5 col-form-label">Jenis Cuti</label> 
    <div class="col-7">
      <select id="jenis" name="jenis" class="custom-select" required="required">
      <option value="">-- Jenis Cuti --</option>
        <?php

        foreach ($ar_jenis as $jen) {
          //edit data lama
        $selt = ($jen['id'] == $row ['nama']) ? "selected" :"";
        ?>
        <option value="<?= $jen ['id']?>" <?= $selt?> > <?= $jen ['nama']?></option>
         <?php } ?>
      </select>
    </div>
  </div>
  <div class="form-group row">
    <label for="awal" class="col-5 col-form-label">Tanggal Awal</label> 
    <div class="col-7">
      <input id="awal" name="awal" type="date" class="form-control" required="required">
    </div>
  </div>
  <div class="form-group row">
    <label for="akhir" class="col-5 col-form-label">Tanggal Akhir</label> 
    <div class="col-7">
      <input id="akhir" name="akhir" type="date" class="form-control" required="required">
    </div>
  </div>
  <div class="form-group row">
    <label for="Masuk" class="col-5 col-form-label">Tanggal Masuk</label> 
    <div class="col-7">
      <input id="Masuk" name="Masuk" type="date" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label class="col-5">Status</label> 
    <div class="col-7">
    <?php
    $no = 0;
      foreach ($ar_status as $st) {
        //edit data lama
        $cek = ($st == $row ['status']) ? "checked" :"";
      ?>
      <div class="custom-control custom-radio custom-control-inline">

        <input name="st" id="st_<?= $no ?>" type="radio" class="custom-control-input" value="<?=$st?>"<?= $cek?> > 
        <label for="st_<?= $no ?>" class="custom-control-label"><?=$st?></label>
      </div>
       <?php  $no++; } ?>
    </div>
  </div>
<div class="form-group row">
    <label for="ket" class="col-5 col-form-label">Bukti</label> 
    <div class="col-7">
      <input id="bukti" name="bukti" type="file" class="form-control">
    </div>
</div>
  <div class="form-group row">
    <label for="ket" class="col-5 col-form-label">Keterangan</label> 
    <div class="col-7">
      <input id="ket" name="ket" type="text" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="sisa" class="col-5 col-form-label">Sisa Cuti</label> 
    <div class="col-7">
      <input id="sisa" name="sisa" type="number" class="form-control">
    </div>
  </div> 
  <div class="form-group row">
    <div class="offset-5 col-7">
      <button name="simpan" type="submit" class="btn btn-primary">Simpan</button>
    </div>
  </div>
</form>