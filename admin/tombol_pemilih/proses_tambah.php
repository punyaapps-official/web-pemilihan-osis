<?php 

require '../../config.php';

 		$no_id               = $_POST['no_id'];
        $password           = $_POST['password'];
        $nm_siswa 		= $_POST['nm_siswa'];
        $nama_kelas         = $_POST['nama_kelas'];
        $hadir      = $_POST['hadir'];
 		
      
		

$cek = mysqli_num_rows(mysqli_query($db,"SELECT * FROM tb_pemilih WHERE no_id='$no_id' "));
        if ($cek > 0) {
            

    echo "<script>window.alert('No Identitas yang anda masukan sudah ada, Silahkan Input Ulang')
    window.location='tambah_pemilih.php'</script>"; }

    else 

    {



   	 $result =	mysqli_query($db, "INSERT INTO tb_pemilih VALUES ('', '$no_id',$password, '$nm_siswa', '$nama_kelas', '$hadir' )");

        echo "<script>
            alert('data berhasil di import');
            document.location.href = '../data_pemilih.php';
            </script>"; }


 
?>