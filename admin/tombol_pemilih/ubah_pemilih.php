<?php 

	session_start();

	if($_SESSION['username'] == false && $_SESSION['password'] == false ){ // Jika tidak ada session username berarti dia belum login
	header("location: ../index.php"); // Kita Redirect ke halaman index.php karena belum login
	}

 ?>




<!DOCTYPE html>
<html>
<head>
	<title>DATA DPT | UBAH</title>
	<link rel="stylesheet" type="text/css" href="../../css/style_halaman_admin2.css">
	<link rel="shortcut icon" href="../../image/logo.png">

	
</head>
<body>

	

	<div class="data">

	<center>
		<h1>DATA DPT</h1>
		<h3>PEMILIHAN OSIS</h3>
	</center>

	
		<?php 
		// koneksi database
		require '../../config.php';
		$id_pemilih 		= $_GET['id'];
		$data 		= mysqli_query($db ,"SELECT * FROM tb_pemilih WHERE id_pemilih='$id_pemilih' " );
		$d 			= mysqli_fetch_assoc($data);

		?>



		<form action="proses_ubah.php" method="post" enctype="multipart/form-data">
		



		<div >
	
			No Identitas  
			<input  type="hidden" name="id_pemilih"  id_pemilih="id_pemilih" class="id_pemilih" value="<?php echo $d['id_pemilih']; ?>" >

			<input type="text" name="no_id"  id="no_id" class="no_id"  autofocus="" placeholder="masukan No Identitas" required="" autocomplete="off" value="<?php echo $d['no_id']; ?>" readonly>
		</div>

		<br>


		<div >
	
			Password  
			<input type="password" name="password"  id="password" class="password"  autofocus="" placeholder="masukan No Identitas" required="" autocomplete="off" value="<?php echo $d['password']; ?>">
		</div>



		
		<br>


		<div >
			Nama Pemilih
			<input type="text" name="nm_siswa"  id="nm_siswa" class="nm_siswa" autofocus="" placeholder="masukan nama" required="" autocomplete="off" value="<?php echo $d['nm_siswa']; ?>">
		</div>
		<br>

		

			Kelas 		
			<select name="nama_kelas"  id="nama_kelas" class="nama_kelas" autofocus="" required="">

				<option><?php echo $d['nama_kelas']; ?></option>

				

				<?php 

				require '../../config.php';

				$data = mysqli_query($db ,"SELECT * FROM tb_kelas " );

				while($d = mysqli_fetch_assoc($data)){

    			echo "<option value='$d[nama_kelas]'>$d[nama_kelas]</option>";
				}



				 ?>

			</select> 
		</div>
	

			<div>
			<input type="hidden" name="hadir"  id="hadir" class="hadir" value="Tidak Hadir">
			</div>


			<br>

			<div align="center">
				<input type="submit" name="tombol" class="tombol" value="UBAH DATA"> 
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