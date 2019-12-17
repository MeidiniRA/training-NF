<?php
$sesi = $_SESSION['MEMBER'];
if(isset($sesi) && $sesi['level'] != 'Karyawan' ){
$ar_judul = ['No','Nama','Action'];

//ciptakan object dari class dari PegawaiModel 
//fungsi - fungsi CRUD

$model = new DivisiModel();
$rs = $model->getAll();

?>
<h3>Daftar Divisi</h3>
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
        <h5 class="modal-title" id="exampleModalLabel">Form Input Data Divisi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php include_once 'form_divisi.php'; ?>
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
  foreach ($rs as $divisi) {
  	?>
    <tr>

      <th scope="row"><?=$no ?></th>
      <td><?=$divisi['nama'] ?></td>
      
      <td>
      	<a class="btn btn-warning btn-sm" href="#">Ubah</a>
      	<a class="btn btn-danger btn-sm" href="#" onclick="return confirm('are you sure')">Hapus</a>
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