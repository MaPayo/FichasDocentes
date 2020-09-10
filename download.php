<?php
namespace es\ucm;
require_once('includes/config.php');

$fileName=$_GET['file'];
$folder = STORAGE.'/'.$_SESSION['idUsuario'];
$filePath= "$folder/$fileName";
header("Cache-Control: public");
header("Content-Description: File Transfer");
header("Content-Disposition: attachment; filename=$fileName");
header("Content-Transfer-Encoding: binary");
        
// Read the file
readfile($filePath);
exit;