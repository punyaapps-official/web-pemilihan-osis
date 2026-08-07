<?php


require '../../config.php';


if (! empty($_FILES)) {
    // Validating SQL file type by extensions
    if (! in_array(strtolower(pathinfo($_FILES["ispring_db_backup"]["name"], PATHINFO_EXTENSION)), array(
        "sql"
    ))) {
        $response = array(
            "type" => "error",
            "message" => "Invalid File Type"
        );
    } else {
        if (is_uploaded_file($_FILES["ispring_db_backup"]["tmp_name"])) {
            move_uploaded_file($_FILES["ispring_db_backup"]["tmp_name"], $_FILES["ispring_db_backup"]["name"]);
            $response = restoreMysqlDB($_FILES["ispring_db_backup"]["name"], $db);
        }
    }
}
 
function restoreMysqlDB($filePath, $db)
{
    $sql = '';
    $error = '';
    
    if (file_exists($filePath)) {
        $lines = file($filePath);
        
        foreach ($lines as $line) {
            
            // Ignoring comments from the SQL script
            if (substr($line, 0, 2) == '--' || $line == '') {
                continue;
            }
            
            $sql .= $line;
            
            if (substr(trim($line), - 1, 1) == ';') {
                $result = mysqli_query($db, $sql);
                if (! $result) {
                    $error .= mysqli_error($db) . "\n";
                }
                $sql = '';
            }
        } // end foreach
        
        if ($error) {
            $response = array(
                "type" => "error",
                "message" => $error
            );
        } else {
            $response = array(
                "type" => "success",
                "message" => "Restore Database Sukses."
            );
        }



    } 


    return $response;

}

echo "<script>
            alert('Selamat data berhasil di restore');
            document.location.href = '../index1.php';
            </script>";


?>