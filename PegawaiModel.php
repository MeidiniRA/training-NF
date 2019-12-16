<?php
/**
* 
*/
class PegawaiModel 
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
		// $sql = "SELECT * FROM pegawai";
		$sql = "SELECT pegawai.*, jabatan.nama AS posisi
				FROM pegawai INNER JOIN jabatan
				ON jabatan.id = pegawai.idjabatan
				ORDER BY id DESC";

		//prepare statement PDO
		$ps= $this->koneksi->prepare($sql);
		$ps->execute();
		$rs=$ps->fetchAll(); // untuk memanggil banyak baris
		return $rs;
	}

	public function view($id){
		// $sql = "SELECT * FROM pegawai WHERE id=?";
		$sql = "SELECT pegawai.*, jabatan.nama AS posisi
				FROM pegawai INNER JOIN jabatan
				ON jabatan.id = pegawai.idjabatan
				WHERE pegawai.id=?";

		//prepare statement PDO
		$ps= $this->koneksi->prepare($sql);
		$ps->execute($id);
		$rs=$ps->fetch(); // untuk memanggil satu baris
		return $rs;
	}
	public function simpan($data){

		//urutan insert mengikuti inputan pada form
		$sql = "INSERT INTO pegawai (nama,gender,idjabatan,alamat,hp,status,jumlah_anak,foto) VALUES (?,?,?,?,?,?,?,?)";

		//prepare statement PDO
		$ps= $this->koneksi->prepare($sql);

		// untuk mengeksekusi data yang akan di simpan
		$ps->execute($data);
	}
	public function ubah($data){

		//urutan insert mengikuti inputan pada form
		$sql = "UPDATE pegawai SET nama=?,gender=?,idjabatan=?,alamat=?,hp=?,status=?,jumlah_anak=?,foto=? WHERE id=?";

		//prepare statement PDO
		$ps= $this->koneksi->prepare($sql);

		// untuk mengeksekusi data yang akan di simpan
		$ps->execute($data);
	}
	public function hapus($id){

		//urutan insert mengikuti inputan pada form
		$sql = "DELETE FROM pegawai WHERE id=?";

		//prepare statement PDO
		$ps= $this->koneksi->prepare($sql);

		// untuk mengeksekusi data yang akan di simpan
		$ps->execute($id);
	}
}