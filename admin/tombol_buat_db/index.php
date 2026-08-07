<?php 


session_start();
$_SESSION['token'] = false;



 ?>

<html>
<head>
	<title>Aplikasi Pemilihan-OSIS</title>
	<link rel="stylesheet" type="text/css" href="../../css/style_halaman_admin2.css">
</head>
<body>

	<div class="login">

	

	<center><h2>BUAT DATABASE?</h2></center>
	
	<p><i>Silahkan isi Password untuk memastikan Anda Sebagai Admin</i></p>


<BR></BR>
		<form action="login.php" method="post" onSubmit="return validasi()">
		

			<div>
				<input type="password" name="password" id="password" placeholder="masukkan password"  autofocus="" autocomplete="off"/>
			</div>	
					<input type="checkbox" onclick="myFunction()">Tampilkan Password
			<BR></BR><BR></BR>		
			<div align="center">
				<input type="submit" value="BUAT" class="tombol">
			</div>

			<p align="center"><a class="tombol-kembali" href="../index.php" >KEMBALI</a></p>
		
			
			 
		

		</form>
</div>



</body>
<footer>
	
	  <p align="center"><i>Copyright | All Right Reserved | Created by: Muhibuddin | 0852 7760 7068 </i></p>
</footer>
 
<script type="text/javascript">
	function validasi() {
		var password = document.getElementById("password").value;		
		if (password!="") {
			return true;
		}else{
			alert('password harus diisi.. !');
			return false;
		}
	}


	function myFunction() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }

        

</script>



</html>