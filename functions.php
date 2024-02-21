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

	mysqli_query($conn, $sql);
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



 ?>
