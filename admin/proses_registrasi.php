<?php

// koneksi database
require '../config.php';


// menangkap data yang di kirim dari form
$id         = $_POST['id'];
$username   = $_POST['username'];

$password   = $_POST['password'];
$password2  = $_POST['password2'];



     // cek apakah pass = pass2
     if ($password !== $password2){
        echo "<script>
        alert('konfirmasi password tidak sesuai, silahkan ulangi');
        document.location.href = 'registrasi.php';
        </script>";
    return false;
    }


    //enkripsi password
    $password = md5($password);
    
    //tambahkan akun baru ke database
    mysqli_query($db, "UPDATE tb_admin SET username    ='$username',
                                        password    = '$password' ");
    

 




echo "<script>
            alert('data berhasil di ubah');
            document.location.href = 'index.php';
            </script>";


?>
