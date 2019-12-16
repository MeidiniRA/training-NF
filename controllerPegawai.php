<?php
include_once 'koneksi.php';
include_once 'PegawaiModel.php';

//tangkap request form nama nama yang ada di element form
$nama = $_POST ['nama'];
$jk = $_POST ['jk'];
$jabatan = $_POST ['jabatan'];
$alamat = $_POST ['alamat'];
$hp = $_POST ['hp'];
$status = $_POST ['status'];
$jumlah = $_POST ['jumlah'];
$foto = $_POST ['foto'];

//gabungkan var di atas ke array
$data = [
	$nama, //? 1
	$jk, //? 2
	$jabatan, //? 3
	$alamat, //? 4
	$hp, //? 5
	$status, //? 6
	$jumlah, //? 7
	$foto //? 8

];
//tangkap request tombol 2
$proses = $_POST['proses'];
$model = new PegawaiModel();
//panggil fungsi-fungsi CRUD di PEgawai Model.php
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
		break;
	
	default:
		//dikembalikan ke dalam pegawai
	header('location:index.php?hal=pegawai');

}

// landing page kehalaman pegawai

header('location:index.php?hal=pegawai');

?>