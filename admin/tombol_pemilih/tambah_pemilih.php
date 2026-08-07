<?php 

session_start();

if($_SESSION['username'] == false && $_SESSION['password'] == false ){ // Jika tidak ada session username berarti dia belum login
header("location: ../index.php"); // Kita Redirect ke halaman index.php karena belum login
}

 ?>




<!DOCTYPE html>
<html>
<head>
	<title>DATA DPT | TAMBAH</title>
	<link rel="stylesheet" type="text/css" href="../../css/style_halaman_admin2.css">
	<link rel="shortcut icon" href="../../image/logo.png">
	
</head>
<body>




	<div class="data">

	<center>
		<h1>DATA DPT</h1>
		<h3>PEMILIHAN OSIS</h3>
	</center>

	
		

		<form action="proses_tambah.php" method="post" enctype="multipart/form-data">
		

		<div>
			No Identitas			
			<input type="text" name="no_id"  id="No Identitas" class="No Identitas"  autofocus="" placeholder="masukan No Identitas" required="" autocomplete="off" >
		</div>
			<br>

		<div>
			Password  			
			<input type="password" name="password"  id="password" class="password"  autofocus="" placeholder="masukan password" required="" autocomplete="off" >
		</div>


		<br>
	

		<div>
			Nama Pemilih
			<input type="text" name="nm_siswa"  id="nm_siswa" class="nm_siswa" autofocus="" placeholder="masukan nama" required="" autocomplete="off">
		</div>
		<br>
		
		<div>
			Kelas 		
			<select name="nama_kelas"  id="nama_kelas" class="nama_kelas" autofocus="" required="">
			<option disabled selected> Pilih </option>

				<?php 

				require '../../config.php';

				$data = mysqli_query($db ,"SELECT * FROM tb_kelas " );

				while($d = mysqli_fetch_assoc($data)){

    			echo "<option value='$d[nama_kelas]'>$d[nama_kelas]</option>";
				}



				 ?>
				


			</select> 

		</div>
		<br>

	
			<div>
			<input type="hidden" name="hadir"  id="hadir" class="hadir" value="Tidak Hadir">
			</div>


		
		

			<div align="center">
				<input type="submit" name="tombol" class="tombol" value="TAMBAH"> 
			</div>			

					
		</form>
</div>
			

	
		
</body>

<br>

<center>
	<a name="tombol" class="tombol-kembali" href="../data_pemilih.php" >KEMBALI</a>
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