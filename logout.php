<?php
session_start();

require 'config.php';

$no_id = $_SESSION['no_id'];
$no_id_safe = mysqli_real_escape_string($db, $no_id);

mysqli_query($db, "DELETE FROM cek_login WHERE id_login = '$no_id_safe'");
session_unset();
session_destroy();

header("Location: index.php");
?>
