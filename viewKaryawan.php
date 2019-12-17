<?php

//tangkap request di url dari klik tombol detail
$id = $_GET['idkar'];
$model = new KaryawanModel();
$rs = $model->view([$id]);
//untuk mengetes pengambilan data
// print_r($rs); exit;

// foreach ($rs as $kar) {
// 	$kar = $kar->(nama);

// }
?>
	<div class="card" style="width: 28rem;">
 	 <img src="images/<?= $rs['foto'] ?>" class="card-img-top" alt="...">
  		<div class="card-body">
    	<h5 class="card-title"><?= $rs['nama'] ?></h5>
    	<p class="card-text">
    		NIK : <?= $rs['nik'] ?>
    		<br/>Jabatan : <?= $rs['posisi'] ?>
    		<br/>Divisi : <?= $rs['departemen'] ?>
    		<br/>Jenis Kelamin : <?= $rs['jk'] ?>
    		<br/>Status : <?= $rs['status_karyawan'] ?>
    		<br/>Jumlah Anak : <?= $rs['jumlah_anak'] ?>
    		<br/>No. Handphone : <?= $rs['no_hp'] ?>
    		<br/>E-mail : <?= $rs['email'] ?>
    		<br/>Alamat : <?= $rs['alamat'] ?>
    		<br/>Tanggal Masuk : <?= $rs['tgl_masuk'] ?>
    	</p>
    	<a href="index.php?hal=karyawan" class="btn btn-primary">Kembali</a>
  		</div>
	</div>




