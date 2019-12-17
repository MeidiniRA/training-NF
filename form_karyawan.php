<?php

//buat array scalar untuk master data gender dan status
$ar_gender = ['L','P'];
$ar_status = ['Menikah','Belum'];
$ar_agama = ['Islam','Kristen','Hindu','Buddha', 'Kongkuchu','Katolik'];

//buat associative untuk master data jabatan
$objek = new JabatanModel();
$ar_jabatan = $objek->getAll();
//buat associative untuk master data divisi
$divisi = new DivisiModel();
$ar_divisi = $divisi->getAll();


//----------------Proses Ubah data-----------------
$idedit = $_REQUEST['idedit'];
$obj2 = new KaryawanModel();
if(!empty($idedit)){
  // modus edit data lama yang di tampilkan di form untuk di edit
  $row = $obj2->view([$idedit]);
}
else{

 // modus entry data baru, form tetap dalam keadaan kosong
  $row = [];
}

?>

<form method="POST" action="controllerKaryawan.php">
<div class="form-group row">
    <label for="nik" class="col-4 col-form-label">NIK</label> 
    <div class="col-8">
      <input id="nik" name="nik" type="text" value="<?=$row['nik']?>" class="form-control" required="required">
    </div>
  </div>
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
        $cek = ($jk == $row ['jk']) ? "checked" :"";
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
        $selt = ($jab['id'] == $row ['jabatan_id']) ? "selected" :"";
        ?>
        <option value="<?= $jab ['id']?>" <?= $selt?> > <?= $jab ['nama']?></option>
         <?php } ?>
      </select>
    </div>
  </div>
  <div class="form-group row">
    <label for="divisi" class="col-4 col-form-label">Divisi</label> 
    <div class="col-8">
      <select id="divisi" name="divisi" required="required" class="custom-select">
        <option value="">-- Pilih Divisi --</option>
        <?php
        foreach ($ar_divisi as $div) {
          //edit data lama
          $selt = ($div['id'] == $row['divisi_id']) ? "selected" :"";
        ?>

        <option value="<?= $div['id']?>" <?= $selt ?> > <?= $div ['nama']?></option>
         <?php } ?>

      </select>
    </div>
  </div>
  <div class="form-group row">
    <label class="col-4">Agama</label> 
    <div class="col-8">
    <?php
        $no = 0;
        foreach ($ar_agama as $ag) {
         //edit data lama
        $cek = ($ag == $row ['agama']) ? "checked" :"";
      ?>
      <div class="custom-control custom-radio custom-control-inline">
        <input name="agama" id="agama_<?= $no ?>" type="radio" class="custom-control-input" value="<?=$ag?>"<?= $cek?> > 
        <label for="agama_<?= $no ?>" class="custom-control-label"><?=$ag?></label>
      </div>
      <?php  $no++; } ?>
    </div>
  </div>
  <div class="form-group row">
    <label class="col-4">Status Marriage</label> 
    <div class="col-8">
    <?php
    $no = 0;
      foreach ($ar_status as $status) {
      //edit data lama
      $cek = ($status== $row ['status_karyawan']) ? "checked" :"";
      ?>
      <div class="custom-control custom-radio custom-control-inline">
        <input name="status" id="status_<?= $no ?>" type="radio" class="custom-control-input" value="<?=$status?>"<?= $cek?> > 
        <label for="status_<?= $no ?>" class="custom-control-label"><?=$status?></label>
      </div>
      <?php  $no++; } ?>
    </div>
  </div>
  <div class="form-group row">
    <label for="jumlah_anak" class="col-4 col-form-label">Jumlah Anak</label> 
    <div class="col-8">
      <input id="jumlah_anak" name="jumlah_anak" value="<?=$row['jumlah_anak']?>" type="number" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="hp" class="col-4 col-form-label">No. Hp</label> 
    <div class="col-8">
      <input id="hp" name="hp" value="<?=$row['no_hp']?>" type="text" required="required" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="email" class="col-4 col-form-label">E-mail</label> 
    <div class="col-8">
      <input id="email" name="email" value="<?=$row['email']?>" type="text" class="form-control" required="required">
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
    <label for="foto" class="col-4 col-form-label">Foto</label> 
    <div class="col-8">
      <input id="foto" name="foto" value="<?=$row['foto']?>" type="file"  class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="tgl_masuk" class="col-4 col-form-label">Tanggal Masuk</label> 
    <div class="col-8">
      <input id="tgl_masuk" name="tgl_masuk" value="<?=$row['tgl_masuk']?>" type="date" class="form-control" required="required">
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