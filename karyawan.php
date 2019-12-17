<?php
$sesi = $_SESSION['MEMBER'];
if(isset($sesi) && $sesi['level'] != 'Karyawan' ){

$ar_judul = ['No','NIK','Nama','Jenis Kelamin','No. Hp','Status','Jabatan','',''];

//ciptakan object dari class dari PegawaiModel 
//fungsi - fungsi CRUD

$model = new KaryawanModel();
$rs = $model->getAll();

?>
<h3>Daftar Karyawan</h3>
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
        <h5 class="modal-title" id="exampleModalLabel">Form Input Data Karyawan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php include_once 'form_karyawan.php'; ?>
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
  foreach ($rs as $kar) {
  	?>
    <tr>

      <th scope="row"><?=$no ?></th>
      <td><?=$kar['nik'] ?></td>
      <td><?=$kar['nama'] ?></td>
      <td><?=$kar['jk'] ?></td>
      <td><?=$kar['no_hp'] ?></td>
      <td><?=$kar['status_karyawan'] ?></td>
      <td><?=$kar['posisi'] ?></td>
      <td align = "right">
      	<a class="btn btn-secondary btn-sm" href="index.php?hal=viewKaryawan&idkar=<?=$kar['id'] ?>">View</a>
        &nbsp;&nbsp;&nbsp;&nbsp;
      	<a class="btn btn-warning btn-sm" href="index.php?hal=form_karyawan&idedit=<?=$kar['id'] ?>">Ubah</a>
      </td>
      <td align="left">
        <form method = "POST" action = "controllerKaryawan.php">
        <button class="btn btn-danger btn-sm" name="proses" value="hapus" onclick="return confirm('are you sure')">Hapus</button>
        <input type="hidden" name="idx" value="<?= $kar['id'] ?>" />
        </form>
        </td>
    </tr>
    <?php  $no++; } ?>
  </tbody>
</table>
<?php
// tutup dari syntax if(isset($_SESSION['MEMBER'])){
}
else{
  include_once 'terlarang.php';
}
?>