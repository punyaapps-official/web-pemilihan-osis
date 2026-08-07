<?php 

session_start();

if($_SESSION['username'] == false && $_SESSION['password'] == false ){ // Jika tidak ada session username berarti dia belum login
header("location: index.php"); // Kita Redirect ke halaman index.php karena belum login
}

 ?>







<!DOCTYPE html>
<html>
<head>
	<title>ADMIN | HAPUS DATABASE</title>
	<link rel="stylesheet" type="text/css" href="../css/style_halaman_admin2.css">
		<link rel="shortcut icon" href="../image/logo.png">
</head>



<body>

<?php 

 require 'index2.php';

 ?>
  



<center><h1>*** ADMIN ***</h1></center>
    <center><h2>PEMILIHAN OSIS</h2></center>
<br><br><br><br>


<table border="1">
	
	
	<h2 align="center">ANDA AKAN MELAKUKAN PENGHAPUSAN SEMUA DATA, ANDA TIDAK YAKIN SILAHKAN KELUAR, JIKA YAKIN SILAHKAN KLIK TOMBOL DI BAWAH</h2>

</table>

<br><br>


<H3  align="center" onclick = "return confirm('WARNING!!! Apakah anda yakin ingin menghapus semua data kecuali data utama?')";><a class="tombol-ubah" href="proses_hapus_database.php">HAPUS DATA (KECUALI DATA UTAMA)</a></H3>

<br><br>

<H3  align="center" onclick = "return confirm('WARNING!!! Apakah anda yakin ingin menghapus semua database, setelah terhapus anda harus kembali membuat database di login utama?')";><a class="tombol-kembali" href="proses_hapus_database_semua.php">HAPUS SEMUA DATABASE</a></H3>



</body>

             
<br><br><br><br><br><br>

               
<br>

		<?php 
		require '../config.php';
		// menampilkan data
		$data = mysqli_query($db,"SELECT * FROM tb_admin");
		$d = mysqli_fetch_assoc($data);
		
		?>

				<footer>
                   <p align="center" ><i><?php echo $d['footer']; ?></i></p>
                </footer>

</html>

