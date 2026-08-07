<?php 

session_start();

if($_SESSION['username'] == false && $_SESSION['password'] == false ){ // Jika tidak ada session username berarti dia belum login
header("location: ../index.php"); // Kita Redirect ke halaman index.php karena belum login
}

 ?>




<!DOCTYPE html>
<html>
<head>
	<title>DATA PESERTA | TAMBAH</title>
	<link rel="stylesheet" type="text/css" href="../../css/style_halaman_admin2.css">
	<link rel="shortcut icon" href="../../image/logo.png">
	
</head>
<body>




	<div class="data">

	<center>
		<h1>DATA PESERTA</h1>
		<h3>TES BERBASIS DIGITAL</h3>
	</center>

	
		

		<form action="proses_tambah.php" method="post" enctype="multipart/form-data">
		

		<div>
			No Identitas 			
			<input type="text" name="no_id"  id="No Identitas" class="No Identitas"  autofocus="" placeholder="masukan No Identitas" required="" autocomplete="off" >
		</div>
			<br>

		<div>
			Nama Kandidat
			<input type="text" name="nama"  id="nama" class="nama" autofocus="" placeholder="masukan nama" required="" autocomplete="off">
		</div>
		<br>
		
		<div>
			Nomor Kandidat

				    <select name="no_kandidat" id="no_kandidat" class="no_kandidat" autofocus="" required="">

				    	<option disabled selected value=""> Pilih </option>
				        <?php
				        for ($i = 1; $i <= 100; $i++) {
				            echo '<option value="' . $i . '">' . $i . '</option>';
				        }
				        ?>
				    </select>
				</div>



	
		<div>
			Foto
			<input type="file" name="foto" required=""/>
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
	<a name="tombol" class="tombol-kembali" href="../data_kandidat.php" >KEMBALI</a>
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