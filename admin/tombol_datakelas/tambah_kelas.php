<?php 

session_start();

// Jika tidak ada session username berarti dia belum login
if($_SESSION['username'] == false && $_SESSION['password'] == false ){ 

// Kita Redirect ke halaman index.php karena belum login	
header("location: ../index.php"); 
}

?>

<!DOCTYPE html>
<html>
<head>


	<title>DATA KELAS | TAMBAH</title>
	<link rel="stylesheet" type="text/css" href="../../css/style_halaman_admin2.css">
	<link rel="shortcut icon" href="../../image/logo.png">
</head>

<body>

	<div class="data">
		<img src="../../image/logo.png" width="100px" height="100px" style="display:block; margin:auto;">
		<center>

		<h1>DATA KELAS</h1>
		<h3>BERBASIS DIGITAL</h3>
		</center>
		
		<form action="proses_tambah.php" method="post">

			<div>
				Nama Kelas
				<input type="text" name="nama_kelas"  id="nama_kelas" class="nama_kelas" autofocus="" placeholder="masukan nama kelas" required="" autocomplete="off">
			</div>
			
			<br>

			<div align="center">
				<input type="submit" name="tombol" class="tombol" value="TAMBAH"> 
			</div>	

		</form>

	</div>
			

		
</body>

<br>

<center>
	<a name="tombol" class="tombol-kembali" href="../data_kelas.php" >KEMBALI</a>
</center>

<br>
<?php 
		require '../../config.php';
		// menampilkan data
		$data = mysqli_query($db,"SELECT * FROM tb_admin");
		$d = mysqli_fetch_assoc($data);
		
		?>

				<footer>
                   <p align="center" ><i><?php echo $d['footer']; ?></i></p>
                </footer>

</html>