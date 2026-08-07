<?php 

require '../../config.php';

$id_pemilih                 = $_GET['id'];

 mysqli_query($db, "DELETE FROM tb_pemilih WHERE id_pemilih = '$id_pemilih' ");

        echo "<script>
            alert('data berhasil di hapus');
            document.location.href = '../data_pemilih.php';
            </script>";
        


 
?>