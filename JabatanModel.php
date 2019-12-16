<?php
/**
* 
*/
class JabatanModel 
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

	public function getAll(){
		$sql = "SELECT * FROM jabatan";

		//prepare statement PDO
		$ps= $this->koneksi->prepare($sql);
		$ps->execute();
		$rs=$ps->fetchAll(); // untuk memanggil banyak baris
		return $rs;
	}

	public function view($id){
		$sql = "SELECT * FROM jabatan WHERE id=?";

		//prepare statement PDO
		$ps= $this->koneksi->prepare($sql);
		$ps->execute($id);
		$rs=$ps->fetch(); // untuk memanggil satu baris
		return $rs;
	}
	public function simpan($data){

		//urutan insert mengikuti inputan pada form
		$sql = "INSERT INTO jabatan (nama) VALUES (?)";

		//prepare statement PDO
		$ps= $this->koneksi->prepare($sql);

		// untuk mengeksekusi data yang akan di simpan
		$ps->execute($data);
	}
}