<?php 
	include_once 'functions.php'; 
	$id = $_GET['id'];
	try {
		hapusBuku($id);
		echo "<script>
			alert('berhasil hapus data buku')
			window.location.href = 'admin.php';
		</script>";
	} catch (Exception $e) {
		echo '<div class="container p-4 "><b>Gagal Hapus <span class="badge text-bg-danger">!</span></b></div>'.$e->getMessage();
	}

?>