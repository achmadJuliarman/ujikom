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
  <table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">ID Buku</th>
        <th scope="col">Kategori</th>
        <th scope="col">Nama Buku</th>
        <th scope="col">Harga</th>
        <th scope="col">Stok</th>
        <th scope="col">Penerbit</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach ($dataBuku as $db) : ?>
      <tr>
        <td>
          <?= $db['id_buku']; ?>
          <?php if($db['id_buku'] == $bukuTerdikit['id_buku']) : ?>
            <span class="badge text-bg-danger">!</span>
          <?php endif; ?>  
        </td>
        <td><?= $db['kategori']; ?></td>
        <td><?= $db['nama_buku']; ?></td>
        <td><?= $db['harga']; ?></td>
        <td><?= $db['stok']; ?></td>
        <td><?= $db['penerbit']; ?></td>
      </tr>
    <?php endforeach; ?>
    </tbody>
  </table>
</div>
<?php include_once 'footer.php' ?>    