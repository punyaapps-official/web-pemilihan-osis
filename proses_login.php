<?php 

session_start();

require 'config.php';

 
if(!$db){
die("database tidak ditemukan, buat database terlebih dahulu" . mysql_error());

}


 $data = mysqli_query($db,"SELECT * FROM tb_admin");
 $d = mysqli_fetch_assoc($data);


 if ($d['aktif'] == 'TIDAK AKTIF') {
    echo '<script type="text/javascript">';
    echo 'alert("MAAF WAKTU PEMILIHAN BELUM DI AKTIFKAN, SILAHKAN MENUNGGU INTRUKSI OPERATOR ...!");';
    echo " document.location='index.php';";
    echo '</script>';
    return false;
}


$no_id 		= $_POST['no_id'];
$password 	= $_POST['password'];
 
$login = mysqli_query($db, "SELECT * FROM tb_pemilih WHERE no_id='$no_id' AND password='$password'");
$cek = mysqli_num_rows($login);
 
if($cek > 0){


$_SESSION['no_id'] 			= true ;
$_SESSION['password'] 		= true ;

	

	echo 

	require 'proses_login_2.php';
	// require 'tampil_peserta.php';

	;


	


}else{
	
?>

	<script language="JavaScript">
            alert('Oops! no identitas atau Password salah, mohon cek kembali ...');
            document.location='index.php';
     </script>

	
 <?php

}


 
?>