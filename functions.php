<?php 

$conn = mysqli_connect("localhost", "root", "", "data");

function query($sql){
	global $conn;
	$query = mysqli_query($conn, $sql);
	return mysqli_fetch_all($query, MYSQLI_ASSOC);
}

function getBuku(){
	return query('SELECT * FROM buku');
}

function cariBuku($keyword){
	return query("SELECT * FROM buku WHERE nama_buku LIKE '%$keyword%'");
}

function tambahBuku($data){
	global $conn;
	$id = $data['id_buku'];
	$namaBuku = $data['nama_buku'];
	$kategori = $data['kategori'];
	$harga = $data['harga'];
	$stok = $data['stok'];
	$penerbit = $data['penerbit'];

	$sql = "INSERT INTO `buku`(`id_buku`, `kategori`, `nama_buku`, `harga`, `stok`, `penerbit`) 
	VALUES ('$id','$kategori','$namaBuku','$harga','$stok','$penerbit')";

	return mysqli_query($conn, $sql);;
}

function ubahBuku($data){
	global $conn;
	$id = $data['id_buku'];
	$namaBuku = $data['nama_buku'];
	$kategori = $data['kategori'];
	$harga = $data['harga'];
	$stok = $data['stok'];
	$penerbit = $data['penerbit'];

	$sql = "UPDATE `buku` SET 
	`kategori`= '$kategori',
	`nama_buku`='$namaBuku',
	`harga`='$harga',
	`stok`='$stok',
	`penerbit`='$penerbit' WHERE id_buku = '$id'";
	mysqli_query($conn, $sql);
}

function hapusBuku($id){
	global $conn;
	$sql = "DELETE FROM buku WHERE id_buku = '$id'";
	mysqli_query($conn, $sql);
}

function getPenerbit(){
	return query("SELECT * FROM penerbit");
}

function cariPenerbit($keyword){
	global $conn;
	return query("SELECT * FROM penerbit WHERE nama_penerbit LIKE '%$keyword%'");
}

function tambahPenerbit($data){
	global $conn;
	$id = $data['id_penerbit'];
	$nama = $data['nama_penerbit'];
	$alamat = $data['alamat'];
	$kota = $data['kota'];
	$telepon = $data['telepon'];
	$sql = "INSERT INTO `penerbit`(`id_penerbit`, `nama_penerbit`, `alamat`, `kota`, `telepon`) 
	VALUES ('$id','$nama','$alamat','$kota','$telepon')";

	mysqli_query($conn, $sql);
}

function ubahPenerbit($data){
	global $conn;
	$id = $data['id_penerbit'];
	$nama = $data['nama_penerbit'];
	$alamat = $data['alamat'];
	$kota = $data['kota'];
	$telepon = $data['telepon'];
	$penerbit_lama = $data['nama_penerbit_lama'];

	$sql1 = "UPDATE `penerbit` 
	SET `id_penerbit`='$id',
	`nama_penerbit`='$nama',
	`alamat`='$alamat',
	`kota`='$kota',
	`telepon`='$telepon' WHERE id_penerbit = '$id';";
	$sql2 ="UPDATE `buku` 
	SET `penerbit`='$nama' WHERE penerbit = '$penerbit_lama'";
	mysqli_query($conn, $sql1);
	mysqli_query($conn, $sql2);
}

function hapusPenerbit($id){
	global $conn;
	$sql = "DELETE FROM penerbit WHERE id_penerbit = '$id'";
	mysqli_query($conn, $sql);
}


 ?>
