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

$proses = $_POST['proses'];
$model = new UserModel();
$model->simpan($data);
switch ($proses) {
	case 'simpan':
		$model->simpan($data);
		break;
	case 'ubah':
		//tangkap request idx u/ ? ke 9
		$data[] = $_POST ['idx']; 
		$model->ubah($data);
		break;
	case 'hapus':
		$id = $_POST ['idx']; // tangkap hidden field idx untuk ? ke-1
		$model->hapus([$id]);

	default:
		//dikembalikan ke dalam pegawai
		header('location:index.php?hal=karyawan');
}

// landing page kehalaman pegawai

header('location:index.php?hal=user');

?>