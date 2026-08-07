<?php 

session_start();

// Jika tidak ada session username berarti dia belum login
if($_SESSION['username'] == false && $_SESSION['password'] == false ){ 

// Kita Redirect ke halaman index.php karena belum login
header("location: index.php"); 

}

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin | Akun </title>
    <link rel="stylesheet" type="text/css" href="../css/style_halaman_admin2.css">
    <link rel="shortcut icon" href="../image/logo.png">
</head>

<body>


	<?php 
 	require 'index2.php';
	?>

	
<div class="data">

    <img src="../image/logo.png" width="100px" height="100px" style="display:block; margin:auto;">

    <center>
    <h1 >HALAMAN AKUN</h1>
    </center>

       
        <?php 
        // koneksi database
        require '../config.php';
        

        // menampilkan data
        $data = mysqli_query($db,"SELECT * FROM tb_admin");
        while($d = mysqli_fetch_assoc($data)){
        ?>
    
    <form action="proses_registrasi.php" method="POST" onSubmit="return validasi()">

        <input type="hidden" name="id" value= "<?php echo $d['id']; ?>" >

        <div>
            Username
            <input type="text" name="username"  id="username" class="username" autofocus="" placeholder="masukan Username" required="" autocomplete="off">
        </div>

        <div>
            Password
            <input type="password" name="password"  id="password" class="password" autofocus="" placeholder="masukan Password" required="" autocomplete="off">
        </div>

        <div>
            Ulangi Password
            <input type="password" name="password2"  id="password2" class="password2" autofocus="" placeholder="Ulangi masukan Password" required="" autocomplete="off">
        </div>

        <input type="checkbox" onclick="myFunction()">Tampilkan Password

    
        <br><br>

        <div align="center">
            <input type="submit" name="tombol" class="tombol" value="UBAH DATA"> 
        </div>  
    
    
    </form>

    <?php
     }
    ?>


</div>

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


<script type="text/javascript">
	
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
