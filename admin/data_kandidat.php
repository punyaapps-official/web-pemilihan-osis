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
	<title>ADMIN | DATA KANDIDAT</title>
	<link rel="stylesheet" type="text/css" href="../css/style_halaman_admin.css">
	<link rel="shortcut icon" href="../image/logo.png">

</head>
<body>

	<?php 

	 require 'index2.php';

	 ?>
	

	<center>
		<h1>DATA KANDIDAT | PEMILIHAN OSIS</h1>


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
		<a class="import-data" href="tombol_kandidat/import_excel.php">TAMBAH DENGAN TEMPLATE</a> 

		<a class="tambah-data"  href="tombol_kandidat/tambah_kandidat.php">TAMBAH KANDIDAT</a> 

		<a class="hapus-data"  href="tombol_kandidat/hapus_semua_kandidat.php" onclick ="return confirm('Apakah anda yakin ingin menghapus SEMUA data ini?');" class="aksi"> HAPUS SEMUA DATA</a> 

		<a class="unduh-data"  target="_blank" href="tombol_kandidat/export_excel_kandidat.php">UNDUH DATA</a> 

		&nbsp;&nbsp;
	</center>	






		<?php 
		// koneksi database
		require '../config.php';

		?>

		<br>

		<div align="center">

			<div align="center" style =" height: 50px;width: 550px;margin-left: 10px;margin-top: 30px;">
			<form action="" method="get">
	    		<input type="text" name="isi_cari" size="50" autofocus placeholder="masukkan pencarian" autocomplete="off" > 
	    		<input  type="submit" name="tombol_cari" class="cari" value ="CARI">
			</form>
			</div>

	<!-- ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------	 -->

		<br>

    	
	</div>

		<br><br>
	<?php 
		// koneksi database
		require '../config.php';

		?>

 		<?php 

        $data = mysqli_query($db,"SELECT * FROM tb_kandidat ");
        $jlh_kandidat = mysqli_num_rows($data);
         
        ?>
        <center>



       <H2> Jumlah Kandidat :<?php  echo $jlh_kandidat;?><H2>

       	
        </center>
		
		<table class="data-table">
			<thead>
		<tr>
			<th>No</th>
			<th>NO IDENTITAS</th>
			<th>NAMA KANDIDAT</th>
            <th>NO KANDIDAT</th>
            <th>FOTO KANDIDAT</th>
            <th>AKSI</th>

		</tr>
		</thead>

		<?php 

			if(isset($_GET['tombol_cari'])) {
			$cari = $_GET['isi_cari'];
			$data = mysqli_query($db ,"SELECT * FROM tb_kandidat WHERE no_id like '%$cari%' OR
																	nama like '%$cari%' OR
																	no_kandidat like '%$cari%' ");

			}

			else {

			$data = mysqli_query($db ,"SELECT * FROM tb_kandidat ORDER BY no_kandidat ASC" ); //ASC

			}

			$no = 1;

			while($d = mysqli_fetch_array($data)){
		?>

		
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo $d['no_id']; ?></td>
			<td><?php echo $d['nama']; ?></td>
			<td><?php echo $d['no_kandidat']; ?></td>
			<td><img src="../image/foto_kandidat/<?php echo $d['photo']; ?> " width="50"></td>
			
            <td>
            	<br>
            		<a class="ubah-data"  href="tombol_kandidat/ubah_kandidat.php?id= <?= $d ["id_kandidat"]; ?>" class="aksi"> ubah</a> <br><br>
            		<a class="hapus-data"  href="tombol_kandidat/proses_hapus.php?id= <?= $d ["id_kandidat"]; ?>" onclick ="return confirm('Apakah anda yakin ingin menghapus data ini?');" class="aksi"> hapus </a> 
            		<br><br>	
        	</td>
        
		</tr>

		<?php  
			} 
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