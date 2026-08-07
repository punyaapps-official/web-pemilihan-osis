<?php 

require '../../config.php';
		
		
 		$nama_kelas 		= $_POST['nama_kelas'];
		
		$cek = mysqli_num_rows(mysqli_query($db,"SELECT * FROM tb_kelas WHERE nama_kelas='$nama_kelas' "));
    	if ($cek > 0) {

    echo "<script>window.alert('Nama Kelas yang anda masukan sudah ada, Silahkan Input Ulang')
    window.location='tambah_kelas.php'</script>"; }

    else 

    {
	
		mysqli_query($db, "INSERT INTO tb_kelas VALUES ('', '$nama_kelas')");

        echo "<script>
            alert('data berhasil di import');
            document.location.href = '../data_kelas.php';
            </script>"; }
        


 
?>