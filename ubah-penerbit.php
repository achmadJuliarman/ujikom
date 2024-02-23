<?php
include_once 'header.php'; 
include_once 'functions.php'; 
$id = $_GET['id'];
$penerbitUbah = query("SELECT * FROM penerbit WHERE id_penerbit = '$id'")[0];
if (isset($_POST['ubah'])) 
{
	try {
		ubahPenerbit($_POST);
		echo "<script>
			alert('berhasil menambahkan data Penerbit')
			window.location.href = 'admin.php';
		</script>";

	} catch (Exception $e) {
		echo '<div class="container p-4 "><b>gagal mengubah <span class="badge text-bg-danger">!</span></b></div>'.$e->getMessage();
	}
}
 ?>
<form action="" method="post">
<div class="container p-4 ">
	<input type="hidden" class="form-control" id="nama_penerbit_lama" name="nama_penerbit_lama" value="<?= $penerbitUbah['nama_penerbit'] ?>">
	<input type="hidden" class="form-control" id="id_penerbit_lama" name="id_penerbit_lama" value="<?= $penerbitUbah['id_penerbit'] ?>">
	<div class="mb-3 row">
	    <label for="id" class="col-sm-2 col-form-label">ID Penerbit</label>
	    <div class="col-sm-10">
	      <input type="text" class="form-control" id="id_penerbit" name="id_penerbit" value="<?= $penerbitUbah['id_penerbit'] ?>">
	    </div>
	</div>
	<div class="mb-3 row">
	    <label for="nama" class="col-sm-2 col-form-label">Nama Penerbit</label>
	    <div class="col-sm-10">
	      <input type="text" class="form-control" id="nama_penerbit" name="nama_penerbit" value="<?= $penerbitUbah['nama_penerbit'] ?>">
	    </div>
	</div>
	<div class="mb-3 row">
	    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
	    <div class="col-sm-10">
	      <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $penerbitUbah['alamat'] ?>">
	    </div>
	</div>
	<div class="mb-3 row">
	    <label for="kota" class="col-sm-2 col-form-label">Kota</label>
	    <div class="col-sm-10">
	      <input type="text" class="form-control" id="kota" name="kota" value="<?= $penerbitUbah['kota'] ?>">
	    </div>
	</div>
	<div class="mb-3 row">
	    <label for="telepon" class="col-sm-2 col-form-label">Telepon</label>
	    <div class="col-sm-10">
	      <input type="text" class="form-control" id="telepon" name="telepon" value="<?= $penerbitUbah['telepon'] ?>">
	    </div>
	</div>
	<button class="btn btn-success" type="submit" name="ubah">ubah</button>
</div>
</form>
<?php
include_once 'footer.php';  
 ?>