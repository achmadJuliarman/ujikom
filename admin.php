<?php 
  include_once 'functions.php';
  include_once 'header.php';

  $dataBuku = getBuku();
  $dataPenerbit = getPenerbit();
  $bukuTerdikit = query ('SELECT * FROM buku WHERE stok = (SELECT MIN(stok) FROM buku);')[0];
  if(isset($_GET['cariBuku'])){
    $keyword = $_GET['keyword'];
    $dataBuku = cariBuku($_GET['keyword']);
  }
  if(isset($_GET['cariPenerbit'])){
    $keyword = $_GET['keyword'];
    $dataPenerbit = cariPenerbit($_GET['keyword']);
  }
?>

<div class="container mt-4">
  <h1>BUKU</h1>
  
  <button type="button" class="btn btn-primary mb-2">
    <a href="tambah-buku.php" class="text-decoration-none text-white">Tambah</a>
  </button>

  <form class="d-flex" role="search" action="#buku" method="get">
    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="keyword">
    <button class="btn btn-outline-success" type="submit" name="cariBuku">Search</button>
  </form>
  <table class="table table-hover" id="buku">
    <thead>
      <tr>
        <th scope="col">ID Buku</th>
        <th scope="col">Kategori</th>
        <th scope="col">Nama Buku</th>
        <th scope="col">Harga</th>
        <th scope="col">Stok</th>
        <th scope="col">Penerbit</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach ($dataBuku as $db) : ?>
      <tr>
        <td><?= $db['id_buku']; ?></td>
        <td><?= $db['kategori']; ?></td>
        <td><?= $db['nama_buku']; ?></td>
        <td><?= $db['harga']; ?></td>
        <td>
          <?= $db['stok']; ?>
          <?php if($db['id_buku'] == $bukuTerdikit['id_buku']) : ?>
            <span class="badge text-bg-danger">!</span>
          <?php endif; ?>  
        </td>
        <td><?= $db['penerbit']; ?></td>
        <td>
          <button type="button" class="btn btn-success">
            <a href="ubah-buku.php?id=<?= $db['id_buku']; ?>" class="text-decoration-none text-white">Ubah</a>
          </button>
          <button type="button" class="btn btn-danger">
            <a href="hapus-buku.php?id=<?= $db['id_buku']; ?>" class="text-decoration-none text-white" onclick="return confirm('are you sure?')">Hapus</a>
          </button>
        </td>
      </tr>
    <?php endforeach; ?>
    </tbody>
  </table>
</div>

<hr>
<div class="container mt-4">
  <h1>PENERBIT</h1>
  <button type="button" class="btn btn-primary mb-2">
    <a href="tambah-penerbit.php" class="text-decoration-none text-white">Tambah</a>
  </button>
  <form class="d-flex" role="search" action="#penerbit" method="get">
    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="keyword">
    <button class="btn btn-outline-success" type="submit" name="cariPenerbit">Search</button>
  </form>
  <table class="table table-hover" id="penerbit">
    <thead>
      <tr>
        <th scope="col">ID Penerbit</th>
        <th scope="col">Nama Penerbit</th>
        <th scope="col">Alamat</th>
        <th scope="col">Kota</th>
        <th scope="col">Telepon</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach ($dataPenerbit as $dp) : ?>
      <tr>
        <td><?= $dp['id_penerbit']; ?></td>
        <td><?= $dp['nama_penerbit']; ?></td>
        <td><?= $dp['alamat']; ?></td>
        <td><?= $dp['kota']; ?></td>
        <td><?= $dp['telepon']; ?></td>
        <td>
          <button type="button" class="btn btn-success">
            <a href="ubah-penerbit.php?id=<?= $dp['id_penerbit']; ?>" class="text-decoration-none text-white">Ubah</a>
          </button>
          <button type="button" class="btn btn-danger">
            <a href="hapus-penerbit.php?id=<?= $dp['id_penerbit']; ?>" class="text-decoration-none text-white" onclick="return confirm('are you sure?')">Hapus</a>
          </button>
        </td>
      </tr>
    <?php endforeach; ?>
    </tbody>
  </table>
</div>
<?php include_once 'footer.php' ?>    