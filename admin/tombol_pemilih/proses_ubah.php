<?php 
require '../../config.php';


$id_pemilih          = $_POST['id_pemilih'];
$no_id          = $_POST['no_id'];
$password       = $_POST['password'];
$nm_siswa   = $_POST['nm_siswa'];
$nama_kelas     = $_POST['nama_kelas'];
$hadir  = $_POST['hadir'];


$result = mysqli_query($db, "UPDATE tb_pemilih SET password='$password', nm_siswa='$nm_siswa', nama_kelas='$nama_kelas' WHERE id_pemilih='$id_pemilih'");


    echo "<script>
            alert('Data berhasil diubah');
            window.location.href = '../data_pemilih.php';
            </script>";


?>
