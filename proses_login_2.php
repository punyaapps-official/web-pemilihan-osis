<?php 

require 'config.php';

 		$no_id              = $_POST['no_id'];
        $password           = $_POST['password'];
       
$cek = mysqli_num_rows(mysqli_query($db,"SELECT * FROM cek_login WHERE id_login ='$no_id' "));
        if ($cek > 0) {
            

    echo "<script>window.alert('MAAF ANDA TELAH LOGIN TEMPAT LAIN, JIKA ANDA MERASA BELUM PERNAH LOGIN...SILAHKAN HUBUNGI OPERATOR UNTUK RESET LOGIN')
    window.location='index.php'</script>"; }

    else 

    {



   	 mysqli_query($db, "INSERT INTO cek_login VALUES ('','$no_id' )");

        require 'config.php';
        $no_id       = $_POST['no_id'];
        $password   = $_POST['password'];
     


        echo  
        require 'tampil_data_pemilih.php' ;



}

   
 
?>