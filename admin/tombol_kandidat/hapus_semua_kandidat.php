<?php 
// koneksi database
require '../../config.php';
 
 
// delete data
mysqli_query($db,"DELETE FROM tb_kandidat");
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
            alert('Data kandidat berhasil dihapus');
            document.location.href = '../data_kandidat.php';
          </script>";
}
?>
