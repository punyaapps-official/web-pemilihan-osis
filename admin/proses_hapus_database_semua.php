<?php 

// koneksi database
require '../config.php';
 
// delet data

mysqli_query($db,"DROP DATABASE db_pilosis");



 $folder_path = $_SERVER['DOCUMENT_ROOT'] . '/pemilihan_osis/image/foto_kandidat';

if (is_dir($folder_path)) {
    $files = glob($folder_path . '/*');
    
    foreach ($files as $file) {
        if (is_file($file) && basename($file) !== 'foto.jpg') {
            unlink($file);
        }

    }


   

echo "<script>
            alert('semua database berhasil di hapus, silahkan buat database kembali');
            document.location.href = 'index.php';
            </script>";


}



?>


 

