<div class="col-md-9">

<?php
//tangkap request di url (dari klik menu)

$hal= $_GET['hal'];

if(!empty($hal)){
	//arahkan sesuai halaman request
	include_once $hal.'.php';

}else{

	include_once 'home.php';
}

?>
			
</div>
</div>