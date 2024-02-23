<?php
include_once 'header.php'; 
include_once 'functions.php'; 
$id = $_GET['id'];
$bukuUbah = query("SELECT * FROM buku WHERE id_buku = '$id'")[0];
$penerbit = getPenerbit();
if (isset($_POST['ubah'])) 
{
	try {
		ubahBuku($_POST);
		echo "<script>
			alert('berhasil ubah data buku')
			window.location.href = 'admin.php';
		</script>";
	} catch (Exception $e) {
		echo '<div class="container p-4 "><b>gagal mengubah <span class="badge text-bg-danger">!</span></b></div>'.$e->getMessage();
	}
}
 ?>
<form action="" method="post">
<div class="container p-4 ">
	<div class="mb-3 row">
	    <label for="id" class="col-sm-2 col-form-label">ID Buku</label>
	    <div class="col-sm-10">
	      <input type="text" class="form-control" id="id_buku" name="id_buku" value="<?= $bukuUbah['id_buku'] ?>">
	    </div>
	</div>
	<div class="mb-3 row">
	    <label for="nama" class="col-sm-2 col-form-label">Nama Buku</label>
	    <div class="col-sm-10">
	      <input type="text" class="form-control" id="nama_buku" name="nama_buku" value="<?= $bukuUbah['nama_buku'] ?>">
	    </div>
	</div>
	<div class="mb-3 row">
	    <label for="kategori" class="col-sm-2 col-form-label">Kategori</label>
	    <div class="col-sm-10">
	      <input type="text" class="form-control" id="kategori" name="kategori" value="<?= $bukuUbah['kategori'] ?>">
	    </div>
	</div>
	<div class="mb-3 row">
	    <label for="kategori" class="col-sm-2 col-form-label">Kategori</label>
	    <div class="col-sm-10">
	      <input type="text" class="form-control" id="kategori" name="kategori" value="<?= $bukuUbah['kategori'] ?>">
	    </div>
	</div>
	<div class="mb-3 row">
	    <label for="harga" class="col-sm-2 col-form-label">Harga</label>
	    <div class="col-sm-10">
	      <input type="number" class="form-control" id="harga" name="harga" value="<?= $bukuUbah['harga'] ?>">
	    </div>
	</div>
	<div class="mb-3 row">
	    <label for="stok" class="col-sm-2 col-form-label">stok</label>
	    <div class="col-sm-10">
	      <input type="number" class="form-control" id="stok" name="stok" value="<?= $bukuUbah['stok'] ?>">
	    </div>
	</div>
	<div class="mb-3 form-floating">
	  <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="penerbit">
	    <?php foreach($penerbit as $p) : ?>
	    	<option value="<?= $p['nama_penerbit'] ?>" <?php if($bukuUbah['penerbit'] == $p['nama_penerbit']) {echo 'selected';} ?>><?= $p['nama_penerbit'] ?></option>
	    <?php endforeach; ?>
	  </select>
	  <label for="floatingSelect">Penerbit</label>
	</div>
	<button class="btn btn-success" type="submit" name="ubah">ubah</button>
</div>
</form>
<?php
include_once 'footer.php';  
 ?>