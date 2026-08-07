<!DOCTYPE html>
<html>
<head>
	<title>DATA KANDIDAT</title>
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
	header("Content-Disposition: attachment; filename=Data Kandidat.xls");
	?>

	<center>
		<h3>DATA KANDIDAT</h3>
	</center>

	<table border="1">
		<tr>
			<th>No</th>
			<th>NO IDENTITAS</th>
			<th>NAMA KANDIDAT</th>
            <th>NO KANDIDAT</th>
		
            
            
            
		</tr>
		<?php 
		// koneksi database
		require '../../config.php';
      
		// menampilkan data 
		$data = mysqli_query($db ,"SELECT * FROM tb_kandidat");
		$no = 1;
		while($d = mysqli_fetch_assoc($data)){
		?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo $d['no_id']; ?></td>
			<td><?php echo $d['nama']; ?></td>
			<td><?php echo $d['no_kandidat']; ?></td>
			
			
            
        
		</tr>

		<?php 
		}
		?>
	</table>
</body>
</html>