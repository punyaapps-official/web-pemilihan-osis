<?php 
require '../config.php';

$npsn                   = $_POST['npsn'];
$nm_sekolah               = $_POST['nm_sekolah'];
$desa                   = $_POST['desa'];
$kec                     = $_POST['kec'];
$kab                        = $_POST['kab'];
$tapel                        = $_POST['tapel'];
$tgl                        = $_POST['tgl'];
$kpl_sekolah                 = $_POST['kpl_sekolah'];
$nip                        = $_POST['nip'];
$logo                        = $_POST['logo'];
$bg                        = $_POST['bg'];




// Proses Pengubahan Logo
if(isset($_FILES['logo']['name']) && $_FILES['logo']['name'] != ''){
    $logo_name = 'logo.png';
    $logo_tmp = $_FILES['logo']['tmp_name'];
    $logo_path = '../image/' . $logo_name;

    move_uploaded_file($logo_tmp, $logo_path);

    mysqli_query($db, "UPDATE tb_identitassekolah SET logo='$logo_name' ");
}

// Proses Pengubahan Latar
if(isset($_FILES['bg']['name']) && $_FILES['bg']['name'] != ''){
    $bg_name = 'bg.jpg';
    $bg_tmp = $_FILES['bg']['tmp_name'];
    $bg_path = '../image/' . $bg_name;

    move_uploaded_file($bg_tmp, $bg_path);

    mysqli_query($db, "UPDATE tb_identitassekolah SET bg='$bg_name' ");
}


mysqli_query($db, "UPDATE tb_identitassekolah SET npsn='$npsn', nm_sekolah='$nm_sekolah', desa='$desa', kec='$kec', kab='$kab',  tapel='$tapel' ,  kpl_sekolah='$kpl_sekolah',  nip='$nip', tgl='$tgl' ");

echo "<script>
        alert('Data berhasil diubah');
        window.location.href = 'data_utama.php';
     </script>";
?>
