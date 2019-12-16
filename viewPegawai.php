<?php

//tangkap request di url dari klik tombol detail
$id = $_GET['idpeg'];
$model = new PegawaiModel();
$rs = $model->view([$id]);
//untuk mengetes pengambilan data
//print_r($rs); exit;

// foreach ($rs as $peg) {
// 	$peg = $peg->['nama'];

// }
?>


<div class="card" style="width: 28rem;">
  <img src="img/<?=$rs['foto']?>" class="card-img-top" alt="..."><hr/>
  <div class="card-body">
    <h3 class="card-title"><?= $rs['nama'] ?></h3>
    <p class="card-text">
    Jabatan : <?= $rs['posisi'] ?>
     <br/>Jenis Kelamin : <?= $rs['gender'] ?>
    <br/>Alamat : <?= $rs['alamat'] ?>
    <br/>No. Hp : <?= $rs['hp'] ?>
    <br/>Status : <?= $rs['status'] ?>
    <br/>Jumlah Anak : <?= $rs['jumlah_anak'] ?>	
    </p>
    <a href="#" class="btn btn-primary">Kembali</a>
  </div>
</div>
