<?php
include_once 'header.php'; 
include_once 'functions.php'; 
$penerbit = getPenerbit();
if (isset($_POST['tambah'])) 
{
	try {
		tambahBuku($_POST);
		echo "<script>
			alert('berhasil menambahkan data buku')
			window.location.href = 'admin.php';
		</script>";

	} catch (Exception $e) {
		echo '<div class="container p-4 "><b>gagal menambahkan <span class="badge text-bg-danger">!</span></b></div>'.$e->getMessage();
	}
}
 ?>
<form action="" method="post">
<div class="container p-4 ">
	<div class="mb-3 row">
	    <label for="id" class="col-sm-2 col-form-label">ID Buku</label>
	    <div class="col-sm-10">
	      <input type="text" class="form-control" id="id_buku" name="id_buku">
	    </div>
	</div>
	<div class="mb-3 row">
	    <label for="nama" class="col-sm-2 col-form-label">Nama Buku</label>
	    <div class="col-sm-10">
	      <input type="text" class="form-control" id="nama_buku" name="nama_buku">
	    </div>
	</div>
	<div class="mb-3 row">
	    <label for="kategori" class="col-sm-2 col-form-label">Kategori</label>
	    <div class="col-sm-10">
	      <input type="text" class="form-control" id="kategori" name="kategori">
	    </div>
	</div>
	<div class="mb-3 row">
	    <label for="harga" class="col-sm-2 col-form-label">Harga</label>
	    <div class="col-sm-10">
	      <input type="number" class="form-control" id="harga" name="harga">
	    </div>
	</div>
	<div class="mb-3 row">
	    <label for="stok" class="col-sm-2 col-form-label">stok</label>
	    <div class="col-sm-10">
	      <input type="number" class="form-control" id="stok" name="stok">
	    </div>
	</div>
	<div class="mb-3 form-floating">
	  <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="penerbit">
	    <?php foreach($penerbit as $p) : ?>
	    	<option value="<?= $p['nama_penerbit'] ?>"><?= $p['nama_penerbit'] ?></option>
	    <?php endforeach; ?>
	  </select>
	  <label for="floatingSelect">Penerbit</label>
	</div>
	<button class="btn btn-primary" type="submit" name="tambah">tambah</button>
</div>
</form>
<?php
include_once 'footer.php';  
 ?>