<?php 

require '../config.php';

$id 				= $_GET['id'];

 mysqli_query($db, "DELETE FROM cek_login WHERE id = '$id' ");

        echo "<script>
            alert('data pemilih berhasil di reset');
            document.location.href = 'sudah_login.php';
            </script>";
        


 
?>