<?php 
  include_once 'functions.php';
  include_once 'header.php';

  $dataBuku = query('SELECT * FROM buku');


  if(isset($_GET['cari'])){
    $keyword = $_GET['keyword'];
    $dataBuku = cariBuku($_GET['keyword']);
  }
  
?>

<div class="container mt-4">
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
        <td><?= $db['id_buku']; ?></td>
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