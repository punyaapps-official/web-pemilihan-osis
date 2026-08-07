<?php 
    //session_start();

    // Jika tidak ada session username berarti dia belum login
    if($_SESSION['no_id'] == false && $_SESSION['password'] == false ) {
        // Kita Redirect ke halaman index.php karena belum login    
        header("location: index.php"); 
    }
?>




<!DOCTYPE html>
<html>
<head>
	<title>DATA PEMILIH | PEMILIHAN OSIS</title>
	<link rel="stylesheet" type="text/css" href="css/style_halaman.css">
	<link rel="shortcut icon" href="image/logo.png">

</head>
<body>

	<div class="data">
	
	<center>
		
		
		<?php 
		require 'config.php';

		// menampilkan data

		$data = mysqli_query($db,"SELECT * FROM tb_identitassekolah");
		$d = mysqli_fetch_assoc($data);
		
		?>

		<center>
		<h4><?php echo $d['npsn']; ?> </h4>
		<h4><?php echo $d['nm_sekolah']; ?></h4>
		</center>
		<hr>


		
	<h3>DATA PEMILIH </h3>
	</center>
	
		<?php 
		// koneksi database
		require 'config.php';
		
		$no_id = $_POST['no_id'];
		$_SESSION['no_id'] 	= $no_id;
		
	

		// menampilkan data
		$login = mysqli_query($db, "SELECT * FROM tb_pemilih WHERE no_id='$no_id' ");

		while($d = mysqli_fetch_array($login)){
		?>

		<form action="pilih_kandidat.php" method="post" onSubmit="return validasi()">
		
		

			<div>
				Nomor Identitas 			
				<input type="text" name="no_id" value="<?php echo $d['no_id']; ?>" id="no_id" class="no_id" 
				readonly>
			</div>


			<div>
							
				<input type="hidden" name="password" value="<?php echo $d['password']; ?>" id="password" class="password" readonly>
			</div>


			<div>
				Nama Peserta
				<input type="text" name="nm_siswa" value="<?php echo $d['nm_siswa']; ?>" id="nm_siswa" class="nm_siswa" readonly>
			</div>
			
			
			<div>
				Kelas 		
				<input type="text" name="nama_kelas" value="<?php echo $d['nama_kelas']; ?>" id="nama_kelas" class="nama_kelas" readonly>	
			</div>
			

			
			<p align="center" style="color: red; font-style: italic;">pastikan Identitas di atas sudah sesuai ! </p>	

			<div align="center">
				<input type="submit" name="tombol" class="tombol" value="MASUK UNTUK MEMILIH"> 
			</div>			
					
		</form>
	</div>
			
		<?php

		}

		?>

		
</body>

<br>

<center>
	<!-- <a name="tombol" class="tombol-kembali" href="hapus_semua_sudah_login.php" >KEMBALI</a> -->


	<a name="tombol" class="tombol-kembali" href="logout.php" >KEMBALI</a>

</center>

<br>

		<?php 
		require 'config.php';
		// menampilkan data
		$data = mysqli_query($db,"SELECT * FROM tb_admin");
		$d = mysqli_fetch_assoc($data);
		
		?>

				<footer>
                   <p align="center" ><i><?php echo $d['footer']; ?></i></p>
                </footer>


<script type="text/javascript">


    function validasi() {
    var token = document.getElementById("token").value;
    if (token === "") {
        alert('Token harus diisi!');
        return false;


    } else if (token === "<?php echo $d['token']; ?>") {
        return true;


    } else {
        alert('Token salah! Mohon periksa kembali.');
        document.getElementById("token").value = "";
        return false;
    }
}





</script>





</html>





