<!DOCTYPE html>
<html>
<head>
	<title>ADMIN | DAFTAR KEHADIRAN DPT</title>
	<link rel="stylesheet" type="text/css" href="../css/style_halaman_admin.css">
	<link rel="shortcut icon" href="../image/logo.png">

</head>
<body>

	

	<center>
		<h1>DAFTAR KEHADIRAN DPT - <?php echo $_POST['nama_kelas'] ?> </h1>
	</center>
	<br>


	<center>
		


		<a class="dowload" target="_blank" href="tombol_pemilih/export_excel_hadir_kelas.php?nama_kelas=<?php echo $_POST['nama_kelas'] ?>">DOWLOAD KE EXCEL</a>
		&nbsp;&nbsp;

			<a class="kembali" href="data_hadir.php">KEMBALI</a>

			<a class="dowload" target="_blank" href="data_hasil/proses_pdf_hadir_pilihan.php?nama_kelas=<?php echo $_POST['nama_kelas'] ?>"> DOWLOAD KE PDF</a>

		<br><br>

	</center>


		<?php 
			// koneksi database
			require '../config.php';
		?>

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

	        $nama_kelas=$_POST['nama_kelas'];
			// menampilkan data 
			$data = mysqli_query($db ,"SELECT * FROM tb_pemilih WHERE nama_kelas='$nama_kelas'  ");
		
			$no = 1;
			while($d = mysqli_fetch_assoc($data)){
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