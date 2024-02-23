<?php 
  include_once 'functions.php';
  include_once 'header.php';

  $dataBuku = getBuku();
  $bukuTerdikit = query ('SELECT * FROM buku WHERE stok = (SELECT MIN(stok) FROM buku);')[0];
  if(isset($_GET['cari'])){
    $keyword = $_GET['keyword'];
    $dataBuku = cariBuku($_GET['keyword']);
  }
  
?>

<div class="container mt-4">
  <form class="d-flex" role="search" action="#penerbit" method="get">
    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="keyword">
    <button class="btn btn-outline-success" type="submit" name="cari">Search</button>
  </form>
  <div class="container mt-2 mb-4 d-flex flex-wrap">
    <?php foreach ($dataBuku as $db) : ?>
      <div class="card mt-2 mx-2" style="width: 18rem;">
        <img src="book.png" class="card-img-top" style="width:80%; margin: auto;">
        <div class="card-body">
          <h5 class="card-title"><?= $db['id_buku']; ?></h5>
          <p class="card-text small">Kategori : <?= $db['kategori']; ?></p>
          <p class="card-text small">Nama Buku : <?= $db['nama_buku']; ?></p>
          <p class="card-text small">Harga : <?= number_format($db['harga'],0,".","."); ?></p>
          <p class="card-text small">
            Stok : <?= $db['stok']; ?>
            <?php if($db['id_buku'] == $bukuTerdikit['id_buku']) : ?>
              <span class="badge text-bg-danger">!</span>
            <?php endif; ?></p>
          <p class="card-text small">Penerbit : <?= $db['penerbit']; ?></p>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>
<?php include_once 'footer.php' ?>    