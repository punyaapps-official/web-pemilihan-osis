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
	<title>ADMIN | DATA KELAS</title>
	<link rel="stylesheet" type="text/css" href="../css/style_halaman_admin.css">
	<link rel="shortcut icon" href="../image/logo.png">
</head>




<body>

	<?php 
 	require 'index2.php';
	?>

	<center>
		<h1>DATA KELAS | PEMILIHAN OSIS</h1>
	</center>

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
	
		<a class="import-data" href="tombol_datakelas/import_excel.php">TAMBAH DENGAN TEMPLATE</a> 

		<a class="tambah-data"  href="tombol_datakelas/tambah_kelas.php">TAMBAH KELAS</a> 
	
		<a class="hapus-data"  href="tombol_datakelas/hapus_semua.php" onclick ="return confirm('Apakah anda yakin ingin menghapus SEMUA data ini?');" class="aksi"> HAPUS SEMUA DATA</a> 
		
		<a class="unduh-data"  href="tombol_datakelas/export_excel_kelas.php">UNDUH DATA</a> 
	
		
	</center>	

		<?php 
		// koneksi database
		require '../config.php';

		?>

<br>

	<hr>


	<?php 
		// koneksi database
		require '../config.php';

		?>

 		<?php 

        $data = mysqli_query($db,"SELECT * FROM tb_kelas");
        $jlh_kelas = mysqli_num_rows($data);
         
        ?>
        <center>



       <H2> Jumlah Kelas :<?php  echo $jlh_kelas;?><H2>

       	
        </center>
		
		<table class="data-table">
		
		<thead>
		<tr>
			<th>No</th>
			<th>Nama Kelas</th>
            <th>AKSI</th>
		</tr>
		</thead>

		<?php 

			$data = mysqli_query($db ,"SELECT * FROM tb_kelas");
			$no = 1;
			while($d = mysqli_fetch_assoc($data)){
		?>

		
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo $d['nama_kelas']; ?></td>
			<td>
            	<br>
            	<a class="ubah-data" href="tombol_datakelas/ubah_kelas.php?id= <?= $d ["id_kelas"]; ?>" class="aksi"> ubah</a>
            	<a class="hapus-data" href="tombol_datakelas/proses_hapus.php?id= <?= $d ["id_kelas"]; ?>" onclick ="return confirm('Apakah anda yakin ingin menghapus data ini?');" class="aksi"> hapus </a> 
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