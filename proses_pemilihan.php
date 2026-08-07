<?php 

        session_start();
        require 'config.php';

 		$no_id              = $_POST['no_id'];
        $no_kandidat        = $_POST['no_kandidat'];
       
$cek = mysqli_num_rows(mysqli_query($db,"SELECT * FROM tb_pilih WHERE id_pemilih ='$no_id' "));
        if ($cek > 0) {
            

    // echo "<script>window.alert('MAAF ANDA TELAH MELAKUKAN PEMILIHAN INI')
    // window.location='index.php'</script>"; }


    echo "Maaf...Anda Hanya Memiliki SATU HAK PILIH dan Anda Telah Menggunakan Hak Pilih Tersebut, Hak Pilih Tersebut tidak bisa di UBAH lagi..."; 

    }



    else 

    {



   	 mysqli_query($db, "INSERT INTO tb_pilih VALUES ('','$no_id', '$no_kandidat' )");

       mysqli_query($db,"UPDATE tb_pemilih SET hadir='Hadir' WHERE no_id='$no_id'  ");

        // echo "<script>
        //     alert('Terimakasih, Anda Telah melakukan pemilihan');
        //     document.location.href = 'index.php';
        //     </script>";


             echo "Selamat ... Anda Telah Menggunakan HAK PILIH...Semoga OSIS Semakin Berjaya... Terimakasih";



}

   
 
?>