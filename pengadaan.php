<?php 
include_once 'functions.php';
include_once 'header.php';

$bukuTerdikit = query('SELECT * FROM buku WHERE stok = (SELECT MIN(stok) FROM buku);')[0];
$penerbit = cariPenerbit($bukuTerdikit['penerbit'])[0];
 ?> 

<div class="container mt-4 d-flex justify-content-center">
	<div class="card mb-3" style="width: 20rem;">
	  <div class="card-header text-center bg-danger text-white">
	    Buku Stok Tipis <sup><span class="badge text-bg-secondary"><?= $bukuTerdikit['stok'] ?></span></sup>
	  </div>
	  <ul class="list-group list-group-flush">
	    <li class="list-group-item">ID Buku : <?= $bukuTerdikit['id_buku'] ?></li>
	    <li class="list-group-item">Kategori : <?= $bukuTerdikit['kategori'] ?></li>
	    <li class="list-group-item">Nama Buku : <?= $bukuTerdikit['nama_buku'] ?></li>
	    <li class="list-group-item">Harga : <?= $bukuTerdikit['harga'] ?></li>
	    <li class="list-group-item"><b>Stok : <?= $bukuTerdikit['stok'] ?></b></li>
	    <li class="list-group-item">ID Penerbit : <?= $penerbit['id_penerbit'] ?></li>
	    <li class="list-group-item">Nama Penerbit : <?= $penerbit['nama_penerbit'] ?></li>
	    <li class="list-group-item">Alamat Penerbit : <?= $penerbit['alamat'] ?></li>
	    <li class="list-group-item">Kota Penerbit : <?= $penerbit['kota'] ?></li>
	    <li class="list-group-item">Telepon Penerbit : <?= $penerbit['telepon'] ?></li>
	  </ul>	
	</div>
</div>	


<?php include_once 'footer.php'; ?>