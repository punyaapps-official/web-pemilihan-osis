<?php 

session_start();

if($_SESSION['username'] == false && $_SESSION['password'] == false ){ // Jika tidak ada session username berarti dia belum login
header("location: ../index.php"); // Kita Redirect ke halaman index.php karena belum login
}

 ?>

 




<html>
<head>
	<title>RESTORE DATA</title>
	<link rel="stylesheet" type="text/css" href="../../css/style_halaman_admin2.css">
	<link rel="shortcut icon" href="../../image/logo.png">
</head>

<body>

	<div class="login">


	<center><h2>*** RESTORE ***</h2></center>
	<center><h2>PEMILIHAN OSIS</h2></center>

		<form action="proses-import.php" method="post" enctype="multipart/form-data" onSubmit="return validasi()">
			<div align="Right">
				<input type="file" name="ispring_db_backup" id="ispring_cbt_sekolah_backup"/>
			</div>


			<div align="center">
				<input  type="submit" value="RESTORE" class="tombol">
			</div>

		</form>

	<H3 align="center"><a class="tombol-kembali" href="../index1.php" > KEMBALI </a></H3>
	
	<p><i>*pastikan file yang di import dalam format sql</i></p>

	</div>


	
		<?php 
		require '../../config.php';
		// menampilkan data
		$data = mysqli_query($db,"SELECT * FROM tb_admin");
		$d = mysqli_fetch_assoc($data);
		
		?>

				<footer>
                   <p align="center" ><i><?php echo $d['footer']; ?></i></p>
                </footer>

</body>
 
<script type="text/javascript">
	function validasi() {
		var ispring_db_backup = document.getElementById("ispring_db_backup").value;	
		if (ispring_db_backup != "") {
			return true;
		}else{
			alert('silahkan klik choose file.. !');
			return false;
		}
	}
 
</script>
</html>