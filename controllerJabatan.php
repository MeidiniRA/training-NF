<?php
include_once 'koneksi.php';
include_once 'JabatanModel.php';

//tangkap request form nama nama yang ada di element form
$nama = $_POST ['nama'];

//gabungkan var di atas ke array
$data = [
	$nama //? 1

];

//panggil fungsi simpan di PegawaiModel.php

$model = new JabatanModel();
$model->simpan($data);

// landing page kehalaman pegawai

header('location:index.php?hal=jabatan');

?>