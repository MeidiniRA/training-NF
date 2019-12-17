<?php
include_once 'koneksi.php';
include_once 'CutiModel.php';

//tangkap request form nama nama yang ada di element form
$nik = $_POST ['nik'];
$jenis = $_POST ['jenis'];
$awal = $_POST ['awal'];
$akhir = $_POST ['akhir'];
$masuk = $_POST ['masuk'];
$status = $_POST ['status'];
$bukti = $_POST ['bukti'];
$ket = $_POST ['ket'];
$sisa = $_POST ['sisa'];

//gabungkan var di atas ke array
$data = [
	$nik,
	$jenis,
	$awal,
	$akhir,
	$masuk,
	$status,
	$bukti,
	$ket,
	$sisa
];

//panggil fungsi simpan di PegawaiModel.php
$proses = $_POST['proses'];
$model = new CutiModel();



//panggil fungsi-fungsi CRUD di KaryawanModel.php
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
		header('location:index.php?hal=cuti');
}

// landing page kehalaman pegawai

header('location:index.php?hal=cuti');

?>