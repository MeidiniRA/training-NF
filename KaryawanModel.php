<?php
/**
* 
*/
class KaryawanModel 
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
		$sql = "SELECT karyawan.*, jabatan.nama AS posisi FROM karyawan INNER JOIN jabatan ON jabatan.id = karyawan.jabatan_id 
				ORDER BY id DESC";

		//prepare statement PDO
		$ps= $this->koneksi->prepare($sql);
		$ps->execute();
		$rs=$ps->fetchAll(); // untuk memanggil banyak baris
		return $rs;
	}

	public function view($id){
		$sql = "SELECT karyawan.*, jabatan.nama AS posisi, divisi.nama as departemen  FROM karyawan 
		INNER JOIN jabatan ON jabatan.id = karyawan.jabatan_id
		INNER JOIN divisi ON divisi.id = karyawan.divisi_id
			WHERE karyawan.id=?";

		//prepare statement PDO
		$ps= $this->koneksi->prepare($sql);
		$ps->execute($id);
		$rs=$ps->fetch(); // untuk memanggil satu baris
		return $rs;
	}
	public function simpan($data){

		//urutan insert mengikuti inputan pada form
		$sql = "INSERT INTO karyawan (nik,nama,jk,jabatan_id,divisi_id,agama,status_karyawan,jumlah_anak,no_hp,email,alamat,foto,tgl_masuk) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)";

		//prepare statement PDO
		$ps= $this->koneksi->prepare($sql);

		// untuk mengeksekusi data yang akan di simpan
		$ps->execute($data);
	}

	public function ubah($data){

		//urutan insert mengikuti inputan pada form
		$sql = "update karyawan set nik=?,nama=?,jk=?,jabatan_id=?,divisi_id=?,agama=?,status_karyawan=?,jumlah_anak=?,no_hp=?,email=?,alamat=?,foto=?,tgl_masuk=? WHERE id=?";

		//prepare statement PDO
		$ps= $this->koneksi->prepare($sql);

		// untuk mengeksekusi data yang akan di simpan
		$ps->execute($data);
	}

	public function hapus($id){

		//urutan insert mengikuti inputan pada form
		$sql = "delete from karyawan WHERE id=?";

		//prepare statement PDO
		$ps= $this->koneksi->prepare($sql);

		// untuk mengeksekusi data yang akan di simpan
		$ps->execute($id);
	}


}