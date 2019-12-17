<?php

//buat array scalar untuk master data gender dan status
$ar_level = ['Admin','Karyawan','Manager'];

//buat associative untuk master data jabatan
$model = new KaryawanModel();
$rs = $model->getAll();

?>
<form method="POST" action="controllerUser.php">
  <div class="form-group row">
    <label for="username" class="col-5 col-form-label">Username</label> 
    <div class="col-7">
      <input id="username" name="username" placeholder="Input username" type="number" class="form-control" required="required">
    </div>
  </div>
  <div class="form-group row">
    <label for="password" class="col-5 col-form-label">Password</label> 
    <div class="col-7">
      <input id="password" name="password" placeholder="Input password" type="password" class="form-control" required="required">
    </div>
  </div>
  <div class="form-group row">
    <label for="select" class="col-5 col-form-label">Level</label> 
    <div class="col-7">
      <select id="level" name="level" class="custom-select" required="required">
        <option value="">-- Pilih Level --</option>
        <?php

        foreach ($ar_level as $lev) {
        ?>
        <option value=""><?= $lev?></option>
         <?php } ?>
      </select>
    </div>
  </div>
  <!-- <div class="form-group row">
    <label for="karyawan_id" class="col-5 col-form-label">Karyawan</label> 
    <div class="col-7">
      <select id="karyawan_id" name="karyawan_id" class="custom-select">
        <option value="">Pilih Karyawan</option>
        <?php

        foreach ($rs as $karyawan) {
        ?>
        <option value="<?= $karyawan ['id']?>"><?= $karyawan ['nama']?></option>
         <?php } ?>
      </select>
    </div>
  </div>
  <div class="form-group row">
    <label for="admin_id" class="col-5 col-form-label">Admin</label> 
    <div class="col-7">
      <input id="admin_id" name="admin_id" type="text" class="form-control" required="required">
    </div>
  </div>  -->
  <div class="form-group row">
    <div class="offset-5 col-7">
      <button name="submit" type="submit" class="btn btn-primary">Simpan</button>
    </div>
  </div>
</form>