<?php
include_once 'koneksi.php';
include_once 'DivisiModel.php';

//tangkap request form nama nama yang ada di element form
$nama = $_POST ['divisi'];

//gabungkan var di atas ke array
$data = [
	$nama
];

//panggil fungsi simpan di PegawaiModel.php

$model = new DivisiModel();
$model->simpan($data);

// landing page kehalaman jabatan

header('location:index.php?hal=divisi');

?>