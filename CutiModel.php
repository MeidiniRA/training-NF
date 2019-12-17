<?php
/**
* 
*/
class CutiModel 
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
		$sql = "SELECT * FROM cuti ORDER BY id DESC";

		//prepare statement PDO
		$ps= $this->koneksi->prepare($sql);
		$ps->execute();
		$rs=$ps->fetchAll(); // untuk memanggil banyak baris
		return $rs;
	}

	public function simpan($data){

		//urutan insert mengikuti inputan pada form
		$sql = "INSERT INTO cuti (id,karyawan_id,jenis_cuti_id,tgl_mulai,tgl_akhir,tgl_masuk,status,bukti,keterangan,sisa_cuti) VALUES (?,?,?,?,?,?,?,?,?)";

		//prepare statement PDO
		$ps= $this->koneksi->prepare($sql);

		// untuk mengeksekusi data yang akan di simpan
		$ps->execute($data);
	}

	public function ubah($data){

		//urutan insert mengikuti inputan pada form
		$sql = "UPDATE cuti SET id=?, karyawan_id=?, jenis_cuti_id=?, tgl_mulai=?, tgl_akhir=?, tgl_masuk=?, status=?, bukti=?, keterangan=?, sisa_cuti=?";

		//prepare statement PDO
		$ps= $this->koneksi->prepare($sql);

		// untuk mengeksekusi data yang akan di simpan
		$ps->execute($data);
	}

	public function hapus($id){

		//urutan insert mengikuti inputan pada form
		$sql = "DELETE FROM cuti WHERE id=?";

		//prepare statement PDO
		$ps= $this->koneksi->prepare($sql);

		// untuk mengeksekusi data yang akan di simpan
		$ps->execute($id);
	}


}