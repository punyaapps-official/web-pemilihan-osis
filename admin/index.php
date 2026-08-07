<?php 

	session_start();
	$_SESSION['username'] 		= false;
	$_SESSION['password'] 		= false;

 ?>




<!DOCTYPE html>
<html>
<head>
	<title>ADMIN | PEMILIHAN OSIS</title>
	<link rel="stylesheet" type="text/css" href="../css/style_login_admin.css">
	<link rel="shortcut icon" href="../image/logo.png">

</head>
<body>

</body>

	<div class="container">

		
		<div class="login">
			<img src="../image/logo.png" width="85px" height="85px" style="
			display:block; 
			margin:auto;
			padding: 10px; ">

			<form action="login.php" method="post" onSubmit="return validasi()">
				<h2>LOGIN ADMIN</h2>
				<h3>APLIKASI PEMILIHAN OSIS</h3>
				<hr>
				<br>

				<label for="">Username</label>
				<input type="text"  name="username" id="username" placeholder="Masukkan Username" autofocus="" autocomplete="off">

				<label>Password</label>
				<input type="password"  name="password" id="password" placeholder="Masukkan Password" autofocus="" autocomplete="off" >


			

				<button>MASUK</button>

				






				


			</form>
	



				

				<?php

					    // Konfigurasi koneksi ke database
					    $servername = "localhost";
					    $username = "root";
					    $password = "";
					    $dbname = "db_pilosis";

					    // Membuat koneksi ke database MySQL
					    $conn = mysqli_connect($servername, $username, $password);

					    // Memilih database yang ingin digunakan
					    mysqli_select_db($conn, $dbname);

					    // Mengecek apakah database sudah ada
					    if (mysqli_errno($conn) == 1049) {
					        // Jika database belum ada, maka tombol "Buat Database" ditampilkan



					        echo '

					    	<center>

					    	<a href="tombol_buat_db">Buat Database</a>

					        </center>
					
					        ';


					    } else {
					        // Jika database sudah ada, maka tombol "Buat Database" disembunyikan
					        // Dalam contoh ini, tombol dihilangkan dengan tidak menuliskan tag button di HTML
					    }

					    // Menutup koneksi ke database MySQL
					    mysqli_close($conn);
					?>




				<footer>
					<p><i>Copyright | All Right Reserved <br>Created by: Muhibuddin | versi 1.2.0 </i></p>
				</footer>


		</div>

		<div class="posisi_gambar">
			<img src="../image/bg.jpg">
		</div>

	</div>

		

		<script type="text/javascript">

			function validasi() {
			var username = document.getElementById("username").value;
			var password = document.getElementById("password").value;		
			if (username != "" && password!="") {
			return true;
			}

			else {
			alert('username atau Password harus diisi.. !');
			return false;
				}
			}

			function myFunction() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
            } 
            else {
                x.type = "password";
            	}
        	}
 
</script>

		

</html>