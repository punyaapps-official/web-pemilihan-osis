<?php 

session_start();

if($_SESSION['username'] == false && $_SESSION['password'] == false ){ // Jika tidak ada session username berarti dia belum login
header("location:../index.php"); // Kita Redirect ke halaman index.php karena belum login
}

 ?>

 


<html>
<head>
	<title>IMPORT DATA KANDIDAT</title>
	<link rel="stylesheet" type="text/css" href="../../css/style_halaman_admin2.css">
	<link rel="shortcut icon" href="../../image/logo.png">
</head>

<body>

	
	<div class="login">
	
	<img src="../../image/logo.png" width="100px" height="100px" style="display:block; margin:auto;">

	<center><h2>IMPORT DATA KANDIDAT</h2></center>
	<center><h3>PEMILIHAN OSIS</h3></center>

		<form action="proses-import-excel.php" method="post" enctype="multipart/form-data" onSubmit="return validasi()">
			<div align="Right">
				<input type="file" name="berkas_excel" class="form-control" id="exampleInputFile"/>
			</div>


			<div align="center">
				<input  type="submit" value="Import" name="import"  class="tombol">
			</div>

		</form>

	
	<p><i>*pastikan file yang di import dalam format xls atau tipe excel 97-2003</i></p>
	</div>



	

	<H3  align="center"><a class="tombol-kembali" href="../data_kandidat.php" > KEMBALI </a></H3>


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
		var template_peserta = document.getElementById("template_peserta").value;	
		if (template_peserta != "") {
			return true;
		}else{
			alert('silahkan klik choose file.. !');
			return false;
		}
	}
 
</script>
</html>