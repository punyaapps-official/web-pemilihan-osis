
<?php 

session_start();

if($_SESSION['username'] == false && $_SESSION['password'] == false ){ // Jika tidak ada session username berarti dia belum login
header("location: index.php"); // Kita Redirect ke halaman index.php karena belum login
}

 ?>





<!DOCTYPE html>
<html>
<head>
	<title>TOKEN</title>
	<link rel="stylesheet" type="text/css" href="../css/style_halaman_admin2.css">
	<link rel="shortcut icon" href="../image/logo.png">


</head>
<body>




<?php 

 require 'index2.php';

 ?>

	

	<img src="../image/logo.png" width="100px" height="100px" style="display:block; margin:auto;">

<center><h2>*** ADMIN ***</h2></center>
	<center><h2>PEMILIHAN OSISL</h2></center>


	<center><h3>=== AKTIF/NON AKTIFKAN PEMILIHAN ===</h3> </center>

	
		<br><br>


		<?php 
		// koneksi database
		require '../config.php';

		// menampilkan data
		$data = mysqli_query($db,"SELECT aktif FROM tb_admin");
		while($d = mysqli_fetch_array($data)){
		?>


		

				
			<div align="center" class="token">	
				Status Saat ini:
		        <h1><td align="center" ><?php echo $d['aktif']; ?></td></h1>
			</div>

		

		<?php
		}
		?>

<h3 align="center">SILAHKAN UBAH STATUS DENGAN KLIK TOMBOL DI BAWAH INI:</h3>

<br><br>

<H3  align="center" onclick = "return confirm('WARNING!!! Apakah anda yakin ingin mengubah status pemilihan, Jika status --- TIDAK AKTIF --- maka Pemilih tidak bisa melakukan pemilihan?')";><a class="tombol-ubah" href="proses_aktif.php">AKTI/NON AKTIF</a></H3>


</body>





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