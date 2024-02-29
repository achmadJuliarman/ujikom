<?php 
include_once 'functions.php';
include_once 'header.php';

$bukuTerdikit = query('SELECT * FROM buku WHERE stok = (SELECT MIN(stok) FROM buku);');
 ?> 

<div class="container mt-4 d-flex justify-content-center">
	<?php foreach($bukuTerdikit as $bt) : ?>
	<div class="card mb-3 mx-2" style="width: 20rem;">
	  <div class="card-header text-center bg-danger text-white">
	    Stok Buku Minim
	  </div>
	  <ul class="list-group list-group-flush">
	    <li class="list-group-item">Nama Buku : <?= $bt['nama_buku'] ?></li>
	    <li class="list-group-item">Pernerbit : <?= $bt['penerbit'] ?></li>
	    <li class="list-group-item"><b>Stok : <?= $bt['stok'] ?></b></li>
	  </ul>	
	</div>
	<?php endforeach; ?>
</div>	


<?php include_once 'footer.php'; ?>