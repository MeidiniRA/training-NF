<?php
session_start();
include_once 'koneksi.php';
include_once 'LoginModel.php';

//tangkap request form nama nama yang ada di element form
$uname = $_POST ['uname'];
$pass = $_POST ['pass'];

//gabungkan var di atas ke array
$data = [
	$uname, //? 1
	$pass, // ? 2

];


//panggil fungsi-fungsi cek di LoginModel.php

$model = new LoginModel();
$jml= $model->cekLogin($data);
// print_r($jml); ('jumlah baris '.$jml');exit;
if(!empty($jml)){ //sukses login
	$_SESSION['MEMBER'] = $jml;
// landing page kehalaman jabatan

header('location:index.php?hal=home');
}
else{ //gagal login

	echo '<script>
	alert ("Maaf User atau Password Anda Salah!! Silahkan Login Kembali");
	history.go(-1);
	</script>';

}
