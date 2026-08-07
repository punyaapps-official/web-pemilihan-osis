<?php 
// koneksi database
require '../../config.php';
 
// delete data
mysqli_query($db,"DELETE FROM tb_pemilih");
mysqli_query($db,"DELETE FROM cek_login");


    echo "<script>
            alert('Data peserta berhasil dihapus');
            document.location.href = '../data_pemilih.php';
          </script>";
?>
