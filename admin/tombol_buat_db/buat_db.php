<?php


 
  $dbhost = "localhost";
  $dbuser = "root";
  $dbpass = "";
  $link = mysqli_connect($dbhost,$dbuser,$dbpass);
  
  if(!$link){
    die ("Koneksi dengan database gagal: ".mysqli_connect_errno().
         " - ".mysqli_connect_error());
  }


  $query = "CREATE DATABASE IF NOT EXISTS db_pilosis";
  $result = mysqli_query($link, $query);
  
  if(!$result){
    die ("Query Error: ".mysqli_errno($link).
         " - ".mysqli_error($link));
  }
  
 
  $result = mysqli_select_db($link, "db_pilosis");
  if(!$result){
    die ("Query Error: ".mysqli_errno($link).
         " - ".mysqli_error($link));
  }



//1

  $query = "DROP TABLE IF EXISTS cek_login";
  $hasil_query = mysqli_query($link, $query);
  
  if(!$hasil_query){
    die ("Query Error: ".mysqli_errno($link).
         " - ".mysqli_error($link));
  }


  $query  = "CREATE TABLE cek_login (
                          id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                          id_login VARCHAR(255) NOT NULL 

                          )"; 



     
  $hasil_query = mysqli_query($link, $query);
  if(!$hasil_query){
      die ("Query Error: ".mysqli_errno($link).
           " - ".mysqli_error($link));
  }




//2


  $query = "DROP TABLE IF EXISTS tb_admin";
  $hasil_query = mysqli_query($link, $query);
  
  if(!$hasil_query){
    die ("Query Error: ".mysqli_errno($link).
         " - ".mysqli_error($link));
  }


  $query  = "CREATE TABLE tb_admin (
                          
                          username VARCHAR(100) NOT NULL, 
                          password VARCHAR(100) NOT NULL,                       
                          footer VARCHAR(255) NOT NULL,                        
                          aktif VARCHAR(100) NOT NULL 

                          )"; 

  $hasil_query = mysqli_query($link, $query);
  if(!$hasil_query){
      die ("Query Error: ".mysqli_errno($link).
           " - ".mysqli_error($link));
  }



$query  =  "INSERT INTO `tb_admin` (`username`, `password`, `footer` , `aktif`  ) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'Copyright | All Right Reserved | Created by: Muhibuddin | Versi 1.2.0', 'TIDAK AKTIF')";
$hasil_query = mysqli_query($link, $query);



//3

$query = "DROP TABLE IF EXISTS tb_identitassekolah";
  $hasil_query = mysqli_query($link, $query);
  
  if(!$hasil_query){
    die ("Query Error: ".mysqli_errno($link).
         " - ".mysqli_error($link));
  }


  $query  = "CREATE TABLE tb_identitassekolah (
                          
                          npsn VARCHAR(100) NOT NULL, 
                          nm_sekolah VARCHAR(255) NOT NULL,                       
                          desa VARCHAR(255) NOT NULL,                        
                          kec VARCHAR(255) NOT NULL,
                          kab VARCHAR(255) NOT NULL,
                          kpl_sekolah VARCHAR(32) NOT NULL,
                          nip VARCHAR(16) NOT NULL,
                          tapel VARCHAR(10) NOT NULL,
                          tgl DATE NOT NULL,
                          logo VARCHAR(255) NOT NULL,
                          bg VARCHAR(255) NOT NULL
                          

                          )"; 

  $hasil_query = mysqli_query($link, $query);
  if(!$hasil_query){
      die ("Query Error: ".mysqli_errno($link).
           " - ".mysqli_error($link));
  }



$query  =  "INSERT INTO `tb_identitassekolah` (`npsn`, `nm_sekolah`, `desa` , `kec` , `kab`, `kpl_sekolah`, `nip`, `tapel`, `tgl`, `logo`, `bg` ) VALUES ('PEMILIHAN KETUA OSIS', 'SMAN 1 KLUET TIMUR', 'Paya Dapur', 'Kluet Timur' , 'Aceh Selatan' , 'Mushadi, S.Pd', '19870225 201103', '2023/2024', '2023-08-19', 'logo.png' , 'bg.jpg' )";
$hasil_query = mysqli_query($link, $query);


//4

$query = "DROP TABLE IF EXISTS tb_kandidat";
  $hasil_query = mysqli_query($link, $query);
  
  if(!$hasil_query){
    die ("Query Error: ".mysqli_errno($link).
         " - ".mysqli_error($link));
  }

  $query  = "CREATE TABLE tb_kandidat (
                          id_kandidat INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,   
                          no_id VARCHAR(255) NOT NULL,
                          nama VARCHAR(255) NOT NULL,
                          no_kandidat VARCHAR(100) NOT NULL,
                          photo VARCHAR(255) NOT NULL
                        

                         )"; 

  $hasil_query = mysqli_query($link, $query);
  if(!$hasil_query){
      die ("Query Error: ".mysqli_errno($link).
           " - ".mysqli_error($link));
  }

//5

$query = "DROP TABLE IF EXISTS tb_kelas";
  $hasil_query = mysqli_query($link, $query);
  
  if(!$hasil_query){
    die ("Query Error: ".mysqli_errno($link).
         " - ".mysqli_error($link));
  }

  $query  = "CREATE TABLE tb_kelas (
                          id_kelas INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,   
                          nama_kelas VARCHAR(255) NOT NULL
                          
                        

                         )"; 

  $hasil_query = mysqli_query($link, $query);
  if(!$hasil_query){
      die ("Query Error: ".mysqli_errno($link).
           " - ".mysqli_error($link));
  }


//6

$query = "DROP TABLE IF EXISTS tb_pemilih";
  $hasil_query = mysqli_query($link, $query);
  
  if(!$hasil_query){
    die ("Query Error: ".mysqli_errno($link).
         " - ".mysqli_error($link));
  }

  $query  = "CREATE TABLE tb_pemilih (
                          id_pemilih INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,   
                          no_id VARCHAR(255) NOT NULL,
                          password VARCHAR(255) NOT NULL,
                          nm_siswa VARCHAR(255) NOT NULL,
                          nama_kelas VARCHAR(255) NOT NULL,
                          hadir VARCHAR(255) NOT NULL
                          
                        

                         )"; 

  $hasil_query = mysqli_query($link, $query);
  if(!$hasil_query){
      die ("Query Error: ".mysqli_errno($link).
           " - ".mysqli_error($link));
  }


  //7

$query = "DROP TABLE IF EXISTS tb_pilih";
  $hasil_query = mysqli_query($link, $query);
  
  if(!$hasil_query){
    die ("Query Error: ".mysqli_errno($link).
         " - ".mysqli_error($link));
  }

  $query  = "CREATE TABLE tb_pilih (
                          id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,   
                          id_pemilih VARCHAR(255) NOT NULL,
                          id_kandidat VARCHAR(255) NOT NULL
                          
                        

                         )"; 

  $hasil_query = mysqli_query($link, $query);
  if(!$hasil_query){
      die ("Query Error: ".mysqli_errno($link).
           " - ".mysqli_error($link));
  }











  else {
    echo "<script>
            alert('Selamat database berhasil dibuat');
            document.location.href = '../index.php';
            </script>";
  }



  

?>