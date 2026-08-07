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
	<title>ADMIN | DATA DPT</title>
	<link rel="stylesheet" type="text/css" href="../css/style_halaman_admin.css">
	<link rel="shortcut icon" href="../image/logo.png">

</head>
<body>

	<?php 
 	require 'index2.php';
	?>
	
	

	<center>
		<h1>DAFTAR PEMILIH TETAP (DPT)</h1>


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
		<a class="import-data" href="tombol_pemilih/import_excel.php">TAMBAH DENGAN TEMPLATE</a> 

		<a class="tambah-data"  href="tombol_pemilih/tambah_pemilih.php">TAMBAH PEMILIH</a>

		<a class="hapus-data"  href="tombol_pemilih/hapus_semua_pemilih.php" onclick ="return confirm('Apakah anda yakin ingin menghapus SEMUA data ini?');" class="aksi"> HAPUS SEMUA DATA</a> 

		<a class="lihat" href="rekap_data_kelas.php">REKAP DATA</a> 

		<a class="unduh-data"  target="_blank" href="tombol_pemilih/export_excel_pemilih.php">UNDUH DATA</a> 


		
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

        	<form id="menu" name="menu" action="data_pemilih_pilihan.php" method="POST" enctype="multipart/form-data">
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
		// koneksi database
		require '../config.php';

		?>

 		<?php 

        $data = mysqli_query($db,"SELECT * FROM tb_pemilih");
        $jlh_pemilih = mysqli_num_rows($data);
         
        ?>
        <center>



       <H2> Jumlah pemilih :<?php  echo $jlh_pemilih;?><H2>

       	<hr>
       	
       	<br>
        </center>
		
		<table class="data-table">
			<thead>
		<tr>
			<th>No</th>
			<th>No Identitas</th>
			<th>Password</th>
			<th>Nama pemilih</th>
			<th>Kelas</th>
            <th>AKSI</th>

		</tr>
		</thead>

		<?php 

			if(isset($_GET['tombol_cari'])) {
			$cari = $_GET['isi_cari'];
			$data = mysqli_query($db ,"SELECT * FROM tb_pemilih WHERE no_id like '%$cari%' OR
																	password like '%$cari%' OR
																	nm_siswa like '%$cari%' OR
																	nama_kelas like '%$cari%' ");

			}

			else {

			$data = mysqli_query($db ,"SELECT * FROM tb_pemilih" ); //ASC ORDER BY nama_kelas

			}

			$no = 1;

			while($d = mysqli_fetch_array($data)){
		?>

		
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo $d['no_id']; ?></td>
			<td><?php echo $d['password']; ?></td>
			<td><?php echo $d['nm_siswa']; ?></td>
			<td><?php echo $d['nama_kelas']; ?></td>
            <td>
            	<br>
            		<a class="ubah-data"  href="tombol_pemilih/ubah_pemilih.php?id= <?= $d ["id_pemilih"]; ?>" class="aksi"> ubah</a> <br><br>
            		<a class="hapus-data"  href="tombol_pemilih/proses_hapus.php?id= <?= $d ["id_pemilih"]; ?>" onclick ="return confirm('Apakah anda yakin ingin menghapus data ini?');" class="aksi"> hapus </a> 
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