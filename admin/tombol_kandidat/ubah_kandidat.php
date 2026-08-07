<?php 

	session_start();

	if($_SESSION['username'] == false && $_SESSION['password'] == false ){ // Jika tidak ada session username berarti dia belum login
	header("location: ../index.php"); // Kita Redirect ke halaman index.php karena belum login
	}

 ?>




<!DOCTYPE html>
<html>
<head>
	<title>DATA KANDIDAT| UBAH</title>
	<link rel="stylesheet" type="text/css" href="../../css/style_halaman_admin2.css">
	<link rel="shortcut icon" href="../../image/logo.png">

	
</head>
<body>



	

	<div class="data">

	<center>
		<h1>DATA KANDIDAT</h1>
		<h3>PEMILIHAN OSIS</h3>
	</center>

	
		<?php 
		// koneksi database
		require '../../config.php';

		$id_kandidat 		= $_GET['id'];
		
		$data 		= mysqli_query($db ,"SELECT * FROM tb_kandidat WHERE id_kandidat ='$id_kandidat' " );
		$d 			= mysqli_fetch_assoc($data);

		?>


		<form action="proses_ubah.php" method="post" enctype="multipart/form-data">
		
		<div >
	

			<input type="hidden" name="id_kandidat" value=" <?php echo $d['id_kandidat']; ?>">
			

			<div>
    			No Identitas 			
    		<input type="text" name="no_id" id="No Identitas" class="No Identitas" readonly="" autofocus="" value="<?php echo trim($d['no_id']); ?>">
			</div>

		<br>

		<div>
			Nama Kandidat
			<input type="text" name="nama"  id="nama" class="nama" autofocus="" placeholder="masukan nama" required="" autocomplete="off" value="<?php echo $d['nama']; ?>">
		</div>
		<br>

		<div>
			Nomor Kandidat

				    <select name="no_kandidat" id="no_kandidat" class="no_kandidat" autofocus="">

				    	<option disabled selected value=""> <?php echo $d['no_kandidat']; ?> </option>
				        <?php
				        for ($i = 1; $i <= 100; $i++) {
				            echo '<option value="' . $i . '">' . $i . '</option>';
				        }
				        ?>
				    </select>
				</div>



	
		<div>


		<br>

		

			Foto
			<div align="center" >

			<br>

			<?php 
		
		// koneksi database
		require '../../config.php';

		$no_id 		= $_GET['id'];
		$data 		= mysqli_query($db ,"SELECT * FROM tb_kandidat WHERE id_kandidat ='$no_id' " );
		$d = mysqli_fetch_assoc($data);

		?>

		
			<img src="../../image/foto_kandidat/<?php echo $d['photo']; ?>" width="100" >
			<input type="file" name="foto" id="foto" >
			
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