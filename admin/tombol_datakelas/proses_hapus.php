<?php 

require '../../config.php';

$id 				= $_GET['id'];

 mysqli_query($db, "DELETE FROM tb_kelas WHERE id_kelas = '$id' ");

        echo "<script>
            alert('data berhasil di hapus');
            document.location.href = '../data_kelas.php';
            </script>";
        


 
?>