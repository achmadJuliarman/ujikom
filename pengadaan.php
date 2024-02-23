<?php 
include_once 'functions.php';
include_once 'header.php';

$bukuTerdikit = query('SELECT * FROM buku WHERE stok = (SELECT MIN(stok) FROM buku);')[0];
 ?> 

<div class="container mt-4 d-flex justify-content-center">
	<div class="card mb-3" style="width: 20rem;">
	  <div class="card-header text-center bg-danger text-white">
	    Stok Buku Minim
	  </div>
	  <ul class="list-group list-group-flush">
	    <li class="list-group-item">Nama Buku : <?= $bukuTerdikit['nama_buku'] ?></li>
	    <li class="list-group-item">Pernerbit : <?= $bukuTerdikit['penerbit'] ?></li>
	    <li class="list-group-item"><b>Stok : <?= $bukuTerdikit['stok'] ?></b></li>
	  </ul>	
	</div>
</div>	


<?php include_once 'footer.php'; ?>