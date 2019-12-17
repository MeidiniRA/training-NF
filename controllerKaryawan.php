<?php
include_once 'koneksi.php';
include_once 'KaryawanModel.php';

//tangkap request form nama nama yang ada di element form
$nik = $_POST ['nik'];
$nama = $_POST ['nama'];
$jk = $_POST ['jk'];
$jabatan = $_POST ['jabatan'];
$divisi = $_POST ['divisi'];
$agama = $_POST ['agama'];
$status = $_POST ['status'];
$jumlah = $_POST ['jumlah_anak'];
$hp = $_POST ['hp'];
$email = $_POST['email'];
$alamat = $_POST ['alamat'];
$foto = $_POST ['foto'];
$tgl = $_POST ['tgl_masuk'];

//gabungkan var di atas ke array
$data = [
	$nik,
	$nama,
	$jk,
	$jabatan,
	$divisi,
	$agama,
	$status,
	$jumlah,
	$hp,
	$email,
	$alamat,
	$foto,
	$tgl

];

//panggil fungsi simpan di PegawaiModel.php
$proses = $_POST['proses'];
$model = new KaryawanModel();



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
		header('location:index.php?hal=karyawan');
}

// landing page kehalaman pegawai

header('location:index.php?hal=karyawan');

?>