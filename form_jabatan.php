<?php
//------------------------- Proses ubah data ----------------------------
// tangkap request idedit di URL 
$idedit = $_REQUEST['idedit'];
$obj = new JabatanModel();
if(!empty($idedit)){
  // modus edit data lama yang di tampilkan di form untuk di edit
  $row = $obj->view([$idedit]);
}
else{

 // modus entry data baru, form tetap dalam keadaan kosong
  $row = [];
}
?>
<form method="POST" action="controllerJabatan.php">
  <div class="form-group row">
    <label for="nama" class="col-4 col-form-label">Nama Jabatan</label> 
    <div class="col-8">
      <input id="nama" name="nama" value="<?=$row['nama']?>" type="text" required="required" class="form-control">
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