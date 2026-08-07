<?php 

session_start();

if($_SESSION['username'] == false && $_SESSION['password'] == false ){ // Jika tidak ada session username berarti dia belum login
header("location: index.php"); // Kita Redirect ke halaman index.php karena belum login
}

 ?>

 






<!DOCTYPE html>
<html>
<head>
	<title>DATA UTAMA | ADMIN</title>
	<link rel="stylesheet" type="text/css" href="../css/style_halaman_admin2.css">
	<link rel="shortcut icon" href="../image/logo.png">
	
</head>
<body>

	<?php 
    require 'index2.php';
    ?> 

<center>
	khusus untuk ubah data logo sekolah atau latar, <br>
	setelah ubah maka harus melakukan hapus historis browser agar terjadi perubahan data yang di rubah
</center>
<br>


	<div class="data">

	<center>
		<h1>DATA UTAMA</h1>
		<h3>APLIKASI PEMILIHAN OSIS</h3>
	</center>

	<br>
		<?php 
		require '../config.php';


		// menampilkan data
		$data = mysqli_query($db,"SELECT * FROM tb_identitassekolah");
		$d = mysqli_fetch_assoc($data);
		
		?>

		<form action="proses_data_utama.php" method="post" enctype="multipart/form-data">
		
	
			<!-- <input  align="center" size="55" type="text" name="id" id="id" value= "<?php echo $d['id']; ?>"  hidden> -->
		


			<div>
			Nama Pemilihan			
			<input  align="center" size="55" type="text" name="npsn" id="npsn" value= "<?php echo $d['npsn']; ?>"  autofocus="" autocomplete="off" onkeyup="this.value = this.value.toUpperCase()">
		</div>

		<br>

		<div>
			Nama Sekolah			
			<input  align="center" size="55" type="text" name="nm_sekolah" id="nm_sekolah" value= "<?php echo $d['nm_sekolah']; ?>"  autofocus="" autocomplete="off" onkeyup="this.value = this.value.toUpperCase()">
		</div>
	
			<br>	
		<div>
			Desa / Kelurahan 
			<input  align="center" size="55" type="text" name="desa" id="desa" value= "<?php echo $d['desa']; ?>"  autofocus="" autocomplete="off">
		</div>
		<br>
		

		<div>
			Kecamatan 
			<input  align="center" size="55" type="text" name="kec" id="kec" value= "<?php echo $d['kec']; ?>"  autofocus="" autocomplete="off">

		</div>
		<br>
		
		<div>
			Kabupaten / Kota
			<input  align="center" size="55" type="text" name="kab" id="kab" value= "<?php echo $d['kab']; ?>"  autofocus="" autocomplete="off" >
		</div>
		<br>
		
		<div>
			Periode
			<input  align="center" size="55" type="text" name="tapel" id="tapel" value= "<?php echo $d['tapel']; ?>"  autofocus="" autocomplete="off" >
		</div>
		<br>


		<div>
			Tanggal Pelaksanaan
			<input  align="center" size="55" type="date" name="tgl" id="tgl" value= "<?php echo $d['tgl']; ?>"  autofocus="" autocomplete="off" >
		</div>
		<br>


			<div>
			Nama Kepala Sekolah			
			<input  align="center" size="55" type="text" name="kpl_sekolah" id="kpl_sekolah" value= "<?php echo $d['kpl_sekolah']; ?>"  autofocus="" autocomplete="off">
		</div>

			<br>	
			
		<div>
			NIP Kepala Sekolah			
			<input  align="center" size="55" type="text" name="nip" id="nip" value= "<?php echo $d['nip']; ?>"  autofocus="" autocomplete="off" onkeyup="this.value = this.value.toUpperCase()">
		</div>

		<br>			

		<div>
			Logo ....... <br>	
			<img src="../image/<?php echo $d['logo']; ?>" width="100" align="center">
			<input type="file" name="logo" id="logo" >
		</div>
		


			<br>
		<div>
			Latar ....... <br>
			<img src="../image/<?php echo $d['bg']; ?> " width="100" align="center">
			<input type="file" name="bg" id="bg" >
		</div>
	
			<br>



			<div align="center">
				<input type="submit" name="tombol" class="tombol" value="UBAH DATA"> 
			</div>		
	



					
		</form>
</div>
			

	
		
</body>

<br>



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



