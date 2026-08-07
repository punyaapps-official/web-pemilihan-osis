<!DOCTYPE html>
<html>
<head>
	<title>DATA DPT-PEMILIHAN OSIS</title>
</head>
<body>
	<style type="text/css">
	

	}
	table{
		margin: 20px auto;
		border-collapse: collapse;
	}
	table th,
	table td{
		border: 1px solid #3c3c3c;
		padding: 3px 8px;

	}
	a{
		background: blue;
		color: #fff;
		padding: 8px 10px;
		text-decoration: none;
		border-radius: 2px;
	}
	</style>

	<?php
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=Data DPT-Pemilihan OSIS.xls");
	?>

	<center>
		<h3>DATA DPT</h3>
	</center>

	<table border="1">
		<tr>
			<th>No</th>
			<th>No Identitas</th>
			<th>Password</th>
			<th>Nama pemilih</th>
			<th>Kelas</th>
			
		  
            
		</tr>
		<?php 
		// koneksi database
		require '../../config.php';
      
		// menampilkan data 
		$data = mysqli_query($db ,"SELECT * FROM tb_pemilih ");
		$no = 1;
		while($d = mysqli_fetch_assoc($data)){
		?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo "'{$d['no_id']}"; ?></td>
			<td><?php echo $d['password']; ?></td>
			<td><?php echo $d['nm_siswa']; ?></td>
			<td><?php echo $d['nama_kelas']; ?></td>
			
			
            
            
             
		</tr>
		<?php 
		}
		?>
	</table>
</body>
</html>