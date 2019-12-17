<?php
/**
* 
*/
class UserModel 
{
	//member 1 variable / atribute
	public $koneksi;
	public function __construct()
	{
		//member 2 konstruktor
		global $dbh; // panggir var di file lain
		$this->koneksi = $dbh;
	}

	//member 3 method/fungsi/behavior
	//fungsi CRUD

	public function getAll(){
		$sql = "SELECT * FROM user";

		//prepare statement PDO
		$ps= $this->koneksi->prepare($sql);
		$ps->execute();
		$rs=$ps->fetchAll(); // untuk memanggil banyak baris
		return $rs;
	}

	public function lihat($id){
		$sql = "SELECT * FROM user WHERE id=?";

		//prepare statement PDO
		$ps= $this->koneksi->prepare($sql);
		$ps->execute($id);
		$rs=$ps->fetch(); // untuk memanggil satu baris
		return $rs;
	}
	public function simpan($data){

		//urutan insert mengikuti inputan pada form
		$sql = "INSERT INTO user (username,password,level) VALUES (?,?,?";

		//prepare statement PDO
		$ps= $this->koneksi->prepare($sql);

		// untuk mengeksekusi data yang akan di simpan
		$ps->execute($data);
	}
}