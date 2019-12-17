<?php
include_once 'koneksi.php';
include_once 'JabatanModel.php';

//tangkap request form nama nama yang ada di element form
$nama = $_POST ['nama'];

//gabungkan var di atas ke array
$data = [
	$nama //? 1

];

//panggil fungsi simpan di jabatanModel.php

$proses = $_POST['proses'];
$model = new JabatanModel();
//panggil fungsi-fungsi CRUD di jabatan Model.php
switch ($proses) {
	case 'simpan':
	$model->simpan($data);
		break;
	case 'ubah':
	//tangkap request idx u/ ? ke 2
	$data[] = $_POST ['idx']; 
	$model->ubah($data);
		break;
	case 'hapus':
		$id = $_POST ['idx']; // tangkap hidden field idx untuk ? ke-1
		$model->hapus([$id]);
		break;
	
	default:
		//dikembalikan ke dalam jabatan
	header('location:index.php?hal=jabatan');

}
// landing page kehalaman jabatan

header('location:index.php?hal=jabatan');

?>