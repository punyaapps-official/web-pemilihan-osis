<?php

require '../../config.php';
require '../proses_import/vendor/autoload.php';
 
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Csv;
use PhpOffice\PhpSpreadsheet\Reader\Xls;

 

?>
 


<?php
 if(isset($_POST['import'])){
$file_mimes = array('application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

if(isset($_FILES['berkas_excel']['name']) && in_array($_FILES['berkas_excel']['type'], $file_mimes)) {
 
    $arr_file = explode('.', $_FILES['berkas_excel']['name']);
    $extension = end($arr_file);
 
    if('csv' == $extension) {

        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
    } else {
        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
    }
 
    $spreadsheet = $reader->load($_FILES['berkas_excel']['tmp_name']);
     
    $sheetData = $spreadsheet->getActiveSheet()->toArray();
    for($i = 1;$i < count($sheetData);$i++)
    {




        $no_id                  = $sheetData[$i]['1'];
        $nama               = $sheetData[$i]['2'];
        $no_kandidat           = $sheetData[$i]['3'];
        $photo             = $sheetData[$i]['4'];
       
        
        // input data ke database
        
        mysqli_query($db, "INSERT into tb_kandidat (no_id, nama, no_kandidat, photo) values ('$no_id','$nama','$no_kandidat' , '$photo') ");

    }


	echo "<script>
            alert('Selamat, data berhasil di import');
            document.location.href = '../data_kandidat.php';
            </script>";

}
 
else{

	echo "<script>
            alert('maaf!! data gagal di import');
            document.location.href = 'import_excel.php';
            </script>";
}

}


?>