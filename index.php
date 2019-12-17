<?php
session_start();

//file-file penting
include_once 'koneksi.php';

//model
include_once 'KaryawanModel.php';
include_once 'UserModel.php';
include_once 'DivisiModel.php';
include_once 'JabatanModel.php';
include_once 'JenisModel.php';
include_once 'LoginModel.php';
include_once 'CutiModel.php';


include_once 'header.php';
include_once 'menu.php';
echo "<br/>";
include_once 'main.php';
echo "<br/>";
include_once 'footer.php';
