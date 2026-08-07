<?php 

require '../../config.php';

 		$id 				= $_POST['id_kelas'];		
		$nama_kelas 		= $_POST['nama_kelas'];
		
		
	
	$cek = mysqli_num_rows(mysqli_query($db,"SELECT * FROM tb_kelas WHERE nama_kelas='$nama_kelas' "));
    	
    if ($cek > 0) {

    echo "<script>window.alert('Nama Kelas yang anda masukan sudah ada, Silahkan Input Ulang')
    window.location='../data_kelas.php'</script>"; }

    else 

    {
    	


		mysqli_query($db, "UPDATE tb_kelas SET nama_kelas		 	= '$nama_kelas' 
							WHERE id_kelas 							= '$id' ");

        echo "<script>
            alert('data berhasil di ubah');
            document.location.href = '../data_kelas.php';
            </script>"; }
        


 
?>