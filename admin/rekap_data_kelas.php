<?php 

	session_start();

	 // Jika tidak ada session username berarti dia belum login
	if($_SESSION['username'] == false && $_SESSION['password'] == false ){

	// Kita Redirect ke halaman index.php karena belum login	
	header("location: index.php"); 
	}

?>




<!DOCTYPE html>
<html>
<head>
	<title>REKAP DATA PEMILIH</title>
	<link rel="stylesheet" type="text/css" href="../css/style_halaman_admin.css">
	<link rel="shortcut icon" href="../image/logo.png">

</head>
<body>

	



<?php 
		require '../config.php';


		// menampilkan data
		$data = mysqli_query($db,"SELECT * FROM tb_identitassekolah");
		$d = mysqli_fetch_assoc($data);
		
	?>

		<center><h4>
            <?php echo $d['npsn']; ?> -
			<?php echo $d['nm_sekolah']; ?> 
		</h4></center>

		
	<br>


	<center>
		<a class="hapus-data" href="data_pemilih.php">KEMBALI</a> 
		<a class="unduh-data" href="rekap_data_kelas_excel.php">UNDUH KE EXCEL</a> 
	</center>	


		<?php 

        $data = mysqli_query($db,"SELECT * FROM tb_pemilih");
        $jlh_peserta = mysqli_num_rows($data);
         
        ?>
        
       <center><H2> Jumlah Peserta :<?php  echo $jlh_peserta;?><H2></center>
           
           

        
	<!-- ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------	 -->
		
		<table class="data-table">
			<thead>
		<tr>
			<th>No</th>
			<th>nama kelas</th>
			<th>Jumlah Pemilih</th>
		</tr>
		</thead>

		<?php 

		require '../config.php';

		$nama_kelas = [];
		$i = 0;
		
		$data = mysqli_query($db,"SELECT * FROM tb_pemilih");
		$total = mysqli_num_rows($data);	

		function jumlah_peserta($nama_kelas) {

			require '../config.php';

			$data = mysqli_query($db,"SELECT * FROM tb_pemilih  WHERE nama_kelas = '$nama_kelas'");

			$jlh_kab = mysqli_num_rows($data);	
			return $jlh_kab; 
		}
		
		?>
			<tbody>


				<?php
					$i=0;

					
					while($row = mysqli_fetch_array($data)) {
						if(!in_array($row["nama_kelas"], $nama_kelas)) {
							$nama_kelas[] = $row["nama_kelas"]
							

				?>

								<tr>
									<td>
										<?= 1 + $i++; ?> 
									</td>



									<td>
										<?= $row["nama_kelas"] ?>
									</td>
									<td>
										<?= jumlah_peserta($nama_kelas[$i-1]) ?>
									</td>


									



								</tr>
							<?php
						}
					}
				
				?>
			</tbody>
		<?php

		?>

		
	</table>
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