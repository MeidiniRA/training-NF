<?php


//----------------Proses Ubah data-----------------
$id_edit = $_REQUEST['id_edit'];
$obj = new JabatanModel();
if(!empty($idedit)){
  // modus edit data lama yang di tampilkan di form untuk di edit
  $row = $obj->see([$id_edit]);
}
else{

 // modus entry data baru, form tetap dalam keadaan kosong
  $row = [];
}

?>


<form method="POST" action="controllerJabatan.php">
  <div class="form-group row">
    <label for="jabatan" class="col-5 col-form-label">Jabatan</label> 
    <div class="col-7">
      <input id="jabatan" name="jabatan" placeholder="New Jabatan" type="text" class="form-control" required="required">
    </div>
  </div> 
  <div class="form-group row">
  <?php
    if(empty($id_edit)){ //modus entry data baru
    ?>
    <div class="offset-5 col-7">
      <button name="submit" type="submit" class="btn btn-primary">Simpan</button>
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