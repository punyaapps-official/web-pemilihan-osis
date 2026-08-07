<?php 

// koneksi database
require '../config.php';
 
// delet data

mysqli_query($db,"DELETE FROM tb_kandidat");
mysqli_query($db,"DELETE FROM tb_kelas");
mysqli_query($db,"DELETE FROM tb_pemilih");
mysqli_query($db,"DELETE FROM tb_pilih");
mysqli_query($db,"DELETE FROM cek_login");



$folder_path = $_SERVER['DOCUMENT_ROOT'] . '/pemilihan_osis/image/foto_kandidat';

if (is_dir($folder_path)) {
    $files = glob($folder_path . '/*');
    
    foreach ($files as $file) {
        if (is_file($file) && basename($file) !== 'foto.jpg') {
            unlink($file);
        }
    
}



    

echo "<script>
            alert('semua database berhasil di hapus');
            document.location.href = 'index1.php';
            </script>";


}



?>


 

