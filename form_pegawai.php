<?php

//buat array scalar untuk master data gender dan status
$ar_gender = ['L','P'];
$ar_status = ['Menikah','Belum'];

//buat associative untuk master data jabatan
$objek = new JabatanModel();
$ar_jabatan = $objek->getAll();
//------------------------- Proses ubah data ----------------------------
// tangkap request idedit di URL 
$idedit = $_REQUEST['idedit'];
$obj2 = new PegawaiModel();
if(!empty($idedit)){
  // modus edit data lama yang di tampilkan di form untuk di edit
  $row = $obj2->view([$idedit]);
}
else{

 // modus entry data baru, form tetap dalam keadaan kosong
  $row = [];
}

?>
<form method="POST" action="controllerPegawai.php">
  <div class="form-group row">
    <label for="nama" class="col-4 col-form-label">Nama</label> 
    <div class="col-8">
      <input id="nama" name="nama" placeholder="Input Your Name" value="<?=$row['nama']?>" type="text" required="required" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label class="col-4">Jenis Kelamin</label> 
    <div class="col-8">
    <?php
    $no = 0;
      foreach ($ar_gender as $jk) {
        //edit data lama
        $cek = ($jk == $row ['gender']) ? "checked" :"";
      ?>
      <div class="custom-control custom-radio custom-control-inline">

        <input name="jk" id="jk_<?= $no ?>" type="radio" class="custom-control-input" value="<?=$jk?>"<?= $cek?> > 
        <label for="jk_<?= $no ?>" class="custom-control-label"><?=$jk?></label>
      </div>
       <?php  $no++; } ?>
    </div>
  </div>
  <div class="form-group row">
    <label for="jabatan" class="col-4 col-form-label">Jabatan</label> 
    <div class="col-8">
      <select id="jabatan" name="jabatan" required="required" class="custom-select">
        <option value="">-- Pilih Jabatan --</option>
        <?php

        foreach ($ar_jabatan as $jab) {
          //edit data lama
        $selt = ($jab['id'] == $row ['idjabatan']) ? "selected" :"";
        ?>
        <option value="<?= $jab ['id']?>" <?= $selt?> > <?= $jab ['nama']?></option>
         <?php } ?>
      </select>
    </div>
  </div>
  <div class="form-group row">
    <label for="alamat" class="col-4 col-form-label">Alamat</label> 
    <div class="col-8">
      <textarea id="alamat" name="alamat" cols="40" rows="3" aria-describedby="alamatHelpBlock" required="required" class="form-control"><?=$row['alamat']?></textarea> 
      <span id="alamatHelpBlock" class="form-text text-muted">isi alamat lengkap anda</span>
    </div>
  </div>
  <div class="form-group row">
    <label for="hp" class="col-4 col-form-label">No. Hp</label> 
    <div class="col-8">
      <input id="hp" name="hp" type="text" required="required" value="<?=$row['hp']?>" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label class="col-4">Status Marriage</label> 
    <div class="col-8">
    <?php
    $no = 0;
      foreach ($ar_status as $status) {
         //edit data lama
        $cek2 = ($status == $row ['status']) ? "checked" :"";
      ?>
      <div class="custom-control custom-radio custom-control-inline">
        <input name="status" id="status_<?= $no ?>" type="radio" class="custom-control-input" value="<?=$status?>" <?= $cek2 ?> > 
        <label for="status_<?= $no ?>" class="custom-control-label"><?=$status?></label>

      </div>
      <?php  $no++; } ?>
    </div>
  </div>
  <div class="form-group row">
    <label for="jumlah" class="col-4 col-form-label">Jumlah Anak</label> 
    <div class="col-8">
      <input id="jumlah" name="jumlah" value="<?=$row['jumlah_anak']?>" type="text" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="foto" class="col-4 col-form-label">Foto</label> 
    <div class="col-8">
      <input id="foto" name="foto" value="<?=$row['foto']?>" type="text" class="form-control">
    </div>
  </div> 
  <div class="form-group row">
  <?php
  if(empty($idedit)){ //modus entry data baru

  ?>
    <div class="offset-4 col-8">
      <button name="proses" value="simpan" type="submit" class="btn btn-primary">Simpan</button>
      <?php
        }
        else{
          //modus edit data lama
      ?>
      <button name="proses" value="ubah" type="submit" class="btn btn-warning">Ubah</button>
      <input type="hidden" name="idx" value="<?= $idedit ?>" />
      <?php
       }
      ?>
      &nbsp;&nbsp;<button name="proses" value="batal" type="submit" class="btn btn-info">Batal</button>
    </div>
  </div>
</form>