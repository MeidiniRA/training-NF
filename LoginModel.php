<?php
class LoginModel 
{
	//member 1 variable / atribute
	public $koneksi;
	public function __construct()
	{
		//member 2 konstruktor
		global $dbh; // panggil var di file lain
		$this->koneksi = $dbh;
	}

	//member 3 method/fungsi/behavior
	//fungsi CRUD

	public function cekLogin($data){
		$sql = "SELECT * FROM user WHERE username=? AND password = SHA1(?)";

		//prepare statement PDO
		$ps= $this->koneksi->prepare($sql);
		$ps->execute($data);
		$rs=$ps->fetch(); // untuk memanggil satu baris
		return $rs;
	}

}