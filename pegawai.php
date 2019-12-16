
<?php

$ar_judul = ['No','Nama','Gender','Hp','Status','Jabatan','',''];

//ciptakan object dari class dari PegawaiModel 
//fungsi - fungsi CRUD

$model = new PegawaiModel();
$rs = $model->getAll();

?>
<h3>Daftar Pegawai</h3>
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
        <h5 class="modal-title" id="exampleModalLabel">Form Data Pegawai</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php include_once 'form_pegawai.php'; ?>
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
    foreach ($ar_judul as $jdl) {
    // menampilkan headline pada tabel
    ?>
      <th scope="col"><?= $jdl?></th>
     <?php } ?>

    </tr>
  </thead>
  <tbody>
  <?php 
  $no=1;
  foreach ($rs as $peg) {
  	?>
    <tr>

      <th scope="row"><?=$no ?></th>
      <td><?=$peg['nama'] ?></td>
      <td><?=$peg['gender'] ?></td>
      <td><?=$peg['hp'] ?></td>
      <td><?=$peg['status'] ?></td>
      <td><?=$peg['posisi'] ?></td>
      <td align = "right">
      	<a class="btn btn-secondary btn-sm" href="index.php?hal=viewPegawai&idpeg=<?=$peg['id'] ?>">View</a>
        &nbsp;&nbsp;&nbsp;&nbsp;
      	<a class="btn btn-warning btn-sm" href="index.php?hal=form_pegawai&idedit=<?=$peg['id'] ?>">Ubah</a>
      </td>
      <td align="left" >
        <form method ="POST" action ="controllerPegawai.php">
      	<button class="btn btn-danger btn-sm" name="proses" value="hapus" onclick="return confirm('are you sure')">Hapus</button>
        <input type="hidden" name="idx" value="<?= $peg['id'] ?>" />
        </form>
      </td> 
    </tr>
    <?php  $no++; } ?>
  </tbody>
</table>