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
	<title>ADMIN | DATA HADIR</title>
	<link rel="stylesheet" type="text/css" href="../css/style_halaman_admin.css">
	<link rel="shortcut icon" href="../image/logo.png">

</head>
<body>

	<?php 
 	require 'index2.php';
	?>
	
	

	<center>
		<h1>DAFTAR HADIR DPT</h1>


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

		<a class="lihat" href="rekap_data_laporan.php">REKAP DATA</a> 

		<a class="unduh-data"  target="_blank" href="tombol_pemilih/export_excel_hadir.php">UNDUH DATA</a> 

		<a class="dowload" target="_blank" href="data_hasil/proses_pdf_hadir.php">DOWLOAD KE PDF</a>


		
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

    	<div align="center" style =" height: 50px;width: 550px;margin-left: 10px;margin-top: 30px;">

        	<form id="menu" name="menu" action="data_pemilih_hadir.php" method="POST" enctype="multipart/form-data">
        		<select style="cursor: pointer" required id="nama_kelas" name="nama_kelas" size="1">
         		<option value="">Pilih Kelas</option>
				<?php
					require '../config.php';
					$data = mysqli_query($db,"SELECT * FROM tb_pemilih group by nama_kelas");
					$no = 1;
					while($d = mysqli_fetch_array($data)){
				?>
        		<option value="<?php echo $d['nama_kelas']; ?>"><?php echo $d['nama_kelas']; ?></option>
        		<?php
					}
 				?>

				</select>

				<input style="cursor: pointer" title="Klik disini untuk menampilkan hasil setelah memilih kelas." id="kirim" name="kirim" type="submit" value="LIHAT">
			</form>
		</div>
	</div>

		<br><br>


	 <?php 
require '../config.php';

// Menghitung total pemilih
$queryTotalPemilih = "SELECT COUNT(*) as total_pemilih FROM tb_pemilih";
$resultTotalPemilih = mysqli_query($db, $queryTotalPemilih);
$rowTotalPemilih = mysqli_fetch_assoc($resultTotalPemilih);

// Menghitung jumlah yang sudah memilih
$queryPemilihMemilih = "SELECT COUNT(*) as pemilih_memilih FROM tb_pilih";
$resultPemilihMemilih = mysqli_query($db, $queryPemilihMemilih);
$rowPemilihMemilih = mysqli_fetch_assoc($resultPemilihMemilih);

// Menghitung jumlah yang belum memilih
$jumlahPemilihBelumMemilih = $rowTotalPemilih['total_pemilih'] - $rowPemilihMemilih['pemilih_memilih'];
?>

<hr>
<h1>Jumlah DPT  :   <?php echo $rowTotalPemilih['total_pemilih']; ?></h1>
<h1>Jumlah DPT yang memilih :   <?php echo $rowPemilihMemilih['pemilih_memilih']; ?></h1>
<h1>Jumlah DPT yang tidak memilih   :   <?php echo $jumlahPemilihBelumMemilih; ?></h1>
<br>
<hr>




		
		<table class="data-table">
			<thead>
		<tr>
			<th>No</th>
			<th>No Identitas</th>
			<th>Nama pemilih</th>
			<th>Kelas</th>
            <th>Keterangan</th>

		</tr>
		</thead>

		<?php 

			if(isset($_GET['tombol_cari'])) {
			$cari = $_GET['isi_cari'];
			$data = mysqli_query($db ,"SELECT * FROM tb_pemilih WHERE no_id like '%$cari%' OR
																
																	nm_siswa like '%$cari%' OR
											
																	nama_kelas like '%$cari%' ");

			}

			else {

			$data = mysqli_query($db ,"SELECT * FROM tb_pemilih " ); //ASC

			}

			$no = 1;

			while($d = mysqli_fetch_array($data)){
		?>

		
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo $d['no_id']; ?></td>
			
			<td><?php echo $d['nm_siswa']; ?></td>
			
			<td><?php echo $d['nama_kelas']; ?></td>
            	<td><?php echo $d['hadir']; ?></td>
        
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