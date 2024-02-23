<?php
include_once 'header.php'; 
include_once 'functions.php'; 
if (isset($_POST['tambah'])) 
{
	try {
		tambahPenerbit($_POST);
		echo "<script>
			alert('berhasil menambahkan data Penerbit')
			window.location.href = 'admin.php';
		</script>";

	} catch (Exception $e) {
		echo '<div class="container p-4 "><b>gagal menambahkan <span class="badge text-bg-danger">!</span></b></div>';
	}
}
 ?>
<form action="" method="post">
<div class="container p-4 ">
	<div class="mb-3 row">
	    <label for="id" class="col-sm-2 col-form-label">ID Penerbit</label>
	    <div class="col-sm-10">
	      <input type="text" class="form-control" id="id_penerbit" name="id_penerbit">
	    </div>
	</div>
	<div class="mb-3 row">
	    <label for="nama" class="col-sm-2 col-form-label">Nama Penerbit</label>
	    <div class="col-sm-10">
	      <input type="text" class="form-control" id="nama_penerbit" name="nama_penerbit">
	    </div>
	</div>
	<div class="mb-3 row">
	    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
	    <div class="col-sm-10">
	      <input type="text" class="form-control" id="alamat" name="alamat">
	    </div>
	</div>
	<div class="mb-3 row">
	    <label for="kota" class="col-sm-2 col-form-label">Kota</label>
	    <div class="col-sm-10">
	      <input type="text" class="form-control" id="kota" name="kota">
	    </div>
	</div>
	<div class="mb-3 row">
	    <label for="telepon" class="col-sm-2 col-form-label">Telepon</label>
	    <div class="col-sm-10">
	      <input type="text" class="form-control" id="telepon" name="telepon">
	    </div>
	</div>
	<button class="btn btn-primary" type="submit" name="tambah">tambah</button>
</div>
</form>
<?php
include_once 'footer.php';  
 ?>