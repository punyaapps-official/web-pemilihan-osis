<?php 

session_start();

if($_SESSION['username'] == false && $_SESSION['password'] == false ){ // Jika tidak ada session username berarti dia belum login
header("location: index.php"); // Kita Redirect ke halaman index.php karena belum login
}

 ?>


<!DOCTYPE html>
<html>
<head>
	<title>Admin | Beranda</title>
    <link rel="stylesheet" type="text/css" href="../css/style_dashboard.css">
    <link rel="shortcut icon" href="../image/logo.png">


</head>

   <?php 
    require 'index2.php';
    ?> 


<body>

	

<center><h2>--- ADMIN ---</h2></center>
 

    <?php 
		require '../config.php';


		// menampilkan data
		$data = mysqli_query($db,"SELECT * FROM tb_identitassekolah");
		$d = mysqli_fetch_assoc($data);
		
	?>

		<center><h2>
            <?php echo $d['npsn']; ?> -
			<?php echo $d['nm_sekolah']; ?> 
		</h2></center>



    <div class="Kandidat">
        <?php 

        $data = mysqli_query($db,"SELECT * FROM tb_kandidat");
        $jlh_kandidat = mysqli_num_rows($data);
         
        ?>

    
        Jumlah Kandidat <br>
        <?php  echo $jlh_kandidat;?> 
    </div>



    <div class="kelas">
        <?php 

        $data = mysqli_query($db,"SELECT * FROM tb_kelas");
        $jlh_kelas = mysqli_num_rows($data);
         
        ?>

        Jumlah Kelas <br>
         <?php  echo $jlh_kelas;?>
    </div>


    <div class="siswa">
        <?php 

        $data = mysqli_query($db,"SELECT * FROM tb_pemilih");
        $jlh_dpt = mysqli_num_rows($data);
         
        ?>

        Jumlah DPT <br>
         <?php  echo $jlh_dpt;?>
    </div>






    <?php
require '../config.php';


$count2 = mysqli_query ($db,"SELECT * FROM tb_pilih");
$totalData2 = mysqli_num_rows($count2);


?>

    <center>
    <h1 style="color: white;">--- Jumlah Total Peserta Selesai Memilih : <?php echo $totalData2; ?> ---</h1>
    
    <br>
    <hr>
</center>




</div>

<br>
<br>



</body>

             

                <H3 align="center"> 
                   
                    <a class="backup" href="tombol_backup/backup.php"> BACKUP SQL </a> &nbsp;&nbsp; 
                    <a class="restore" href="tombol_restore/import.php" >  RESTORE SQL</a>&nbsp;&nbsp;  
                     <!-- <a class="restore" href="tombol_restore_file/import.php" >  RESTORE FILE DETAIL</a>&nbsp;&nbsp;   -->
                    <a class="keluar"  href="logout.php" > LOGOUT</a> </H3>

<br>

        <?php 
        require '../config.php';
        // menampilkan data
        $data = mysqli_query($db,"SELECT * FROM tb_admin");
        $d = mysqli_fetch_assoc($data);
        
        ?>

                <footer>
                   <p align="center" ><i><?php echo $d['footer']; ?></i></p>
                </footer>

</html>


