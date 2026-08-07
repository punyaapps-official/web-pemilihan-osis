<?php 


require '../../config.php';

$id_kandidat        = $_GET['id'];

$result = mysqli_query($db, "SELECT photo FROM tb_kandidat WHERE id_kandidat = '$id_kandidat'");
$row = mysqli_fetch_assoc($result);
$photo = $row['photo'];

mysqli_query($db, "DELETE FROM tb_kandidat WHERE id_kandidat = '$id_kandidat'");

$folder_path = $_SERVER['DOCUMENT_ROOT'] . '/pemilihan_osis/image/foto_kandidat/';

if (is_dir($folder_path)) {
    $files = glob($folder_path . '/*');
    
    foreach ($files as $file) {
        if (is_file($file) && basename($file) !== 'foto.jpg' && basename($file) === $photo) {
            unlink($file);
        }
    }

    echo "<script>
            alert('Data kandidat berhasil dihapus');
            document.location.href = '../data_kandidat.php';
          </script>";
}
?>
