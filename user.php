<?php

$ar_judul = ['No','Username','Password','Level','Action'];

//ciptakan object dari class dari PegawaiModel 
//fungsi - fungsi CRUD

$model = new UserModel();
$rs = $model->getAll();

?>
<h3>Daftar User</h3>
<!-- ---------------------- awal modal---------------------- -->

<!-- Button trigger modal -->
<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModal">
  Tambah Data

</button>
<br/>
<br/>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Input Data User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php include_once 'form_user.php'; ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>


<!-- ---------------------- akhir modal---------------------- -->
<table class="table thead-dark">
  <thead>
    <tr>
    <?php
    foreach ($ar_judul as $judul) {
    // menampilkan headline pada tabel
    ?>
      <th scope="col"><?= $judul?></th>
     <?php } ?>

    </tr>
  </thead>
  <tbody>
  <?php 
  $no=1;
  foreach ($rs as $user) {
  	?>
    <tr>

      <th scope="row"><?=$no ?></th>
      <td><?=$user['username'] ?></td>
      <td><?=$user['password'] ?></td>
      <td><?=$user['level'] ?></td>
      
      <td>
      	<a class="btn btn-secondary btn-sm" href="index.php?hal=viewUser&iduser=<?=$user['id'] ?>">View</a>
      	<a class="btn btn-warning btn-sm" href="#">Ubah</a>
      	<a class="btn btn-danger btn-sm" href="#" onclick="return confirm('are you sure')">Hapus</a>
      </td>
   
    </tr>
    <?php  $no++; } ?>
  </tbody>
</table>