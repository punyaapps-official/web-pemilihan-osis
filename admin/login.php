<?php 

session_start();


require '../config.php';

 
if(!$db){
die("database tidak ditemukan, buat database terlebih dahulu" . mysql_error());
}


$username = $_POST['username'];
$password = md5($_POST['password']);
 
$login = mysqli_query($db, "SELECT * FROM tb_admin WHERE username='$username' AND password='$password'");
$cek = mysqli_num_rows($login);
 
if($cek > 0){


$_SESSION['username'] = true ;
$_SESSION['password'] = true ;

	

	echo "<script>
            alert('Selamat datang ADMIN PEMILIHAN OSIS');
            document.location.href = 'index1.php';
            </script>";

	// header("location:index1.php");

}else{
	
?>

	<script language="JavaScript">
            alert('Oops! username atau Password salah, mohon cek kembali ...');
            document.location='index.php';
     </script>

	
 <?php

}


 
?>