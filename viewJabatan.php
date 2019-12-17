<?php

//tangkap request di url dari klik tombol detail
$id = $_GET['idjabatan'];
$model = new JabatanModel();
$rs = $model->see([$id]);
//untuk mengetes pengambilan data
// print_r($rs); exit;

// foreach ($rs as $kar) {
// 	$kar = $kar->(nama);

// }
?>
<center>
	<div class="card" style="width: 18rem;">
 	 <img src="images/cartoon-girl.jpg" class="card-img-top" alt="...">
  		<div class="card-body">
    	<h5 class="card-title"></h5>
    	<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    	<a href="#" class="btn btn-primary">Go somewhere</a>
  		</div>
	</div>
</center>




