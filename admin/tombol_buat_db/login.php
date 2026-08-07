<?php 

session_start();


require '../../config.php';

$password = $_POST['password'];


if($password == "OSIS-muhibuddin"){
                
                header("location:buat_db.php");
            

            }else{

            echo "<script>
            alert('maaf, password salah...');
            document.location.href = 'index.php';
            </script>";
            }

 
?>