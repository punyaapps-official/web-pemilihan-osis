<?php 
// koneksi database
require '../config.php';
 


 
// delet data
mysqli_query($db,"DELETE FROM cek_login ");

echo "<script>
            alert('semua data pemilih berhasil di reset');
            document.location.href = 'sudah_login.php';
            </script>";

 
?>
