<?php
include_once 'koneksi.php';
include_once 'UserModel.php';

//tangkap request form nama nama yang ada di element form
$username = $_POST ['username'];
$password = $_POST ['password'];
$level = $_POST ['level'];

//gabungkan var di atas ke array
$data = [
	$username,
	$password,
	$level
];

//panggil fungsi simpan di PegawaiModel.php

$model = new UserModel();
$model->simpan($data);

// landing page kehalaman pegawai

header('location:index.php?hal=user');

?>