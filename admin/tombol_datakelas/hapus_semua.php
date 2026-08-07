<?php 
// koneksi database
require '../../config.php';
 
 
// delet data
mysqli_query($db,"DELETE FROM tb_kelas ");

echo "<script>
            alert('data semua kelas berhasil di hapus');
            document.location.href = '../data_kelas.php';
            </script>";


?>


 

