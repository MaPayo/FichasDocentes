<?php
namespace es\ucm;
require_once('includes/config.php');

$filePath= LOGS.'/log_errores.txt';
header("Cache-Control: public");
header("Content-Description: File Transfer");
header("Content-Disposition: attachment; filename=log_errores.txt");
header("Content-Transfer-Encoding: binary");
        
// Read the file
readfile($filePath);
exit;