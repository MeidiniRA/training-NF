<?php
include_once 'koneksi.php';
include_once 'JenisModel.php';

//tangkap request form nama nama yang ada di element form
$nama = $_POST ['jenis'];

//gabungkan var di atas ke array
$data = [
	$nama
];

//panggil fungsi simpan di PegawaiModel.php

$model = new JenisModel();
$model->simpan($data);

// landing page kehalaman jabatan

header('location:index.php?hal=jenis');

?>