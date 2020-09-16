<?php
namespace es\ucm;
require_once('includes/config.php');


$zip = new \ZipArchive();
// Ruta absoluta
$nombreArchivoZip = STORAGE . "/4-directorio.zip";
$rutaDelDirectorio = STORAGE . "/". $_SESSION['idUsuario'];

if (!$zip->open($nombreArchivoZip, \ZipArchive::CREATE | \ZipArchive::OVERWRITE)) {
    exit("Error abriendo ZIP en $nombreArchivoZip");
}
// Si no hubo problemas, continuamos

// Crear un iterador recursivo que tendrá un iterador recursivo del directorio
$archivos = new \RecursiveIteratorIterator(
    new \RecursiveDirectoryIterator($rutaDelDirectorio),
    \RecursiveIteratorIterator::LEAVES_ONLY
);

foreach ($archivos as $archivo) {
    // No queremos agregar los directorios, pues los nombres
    // de estos se agregarán cuando se agreguen los archivos
    if ($archivo->isDir()) {
        continue;
    }

    $rutaAbsoluta = $archivo->getRealPath();
    // Cortamos para que, suponiendo que la ruta base es: C:\imágenes ...
    // [C:\imágenes\perro.png] se convierta en [perro.png]
    // Y no, no es el basename porque:
    // [C:\imágenes\vacaciones\familia.png] se convierte en [vacaciones\familia.png]
    $nombreArchivo = substr($rutaAbsoluta, strlen($rutaDelDirectorio) + 1);
    $zip->addFile($rutaAbsoluta, $nombreArchivo);
}
// No olvides cerrar el archivo
$resultado = $zip->close();

header("Cache-Control: public");
header("Content-Description: File Transfer");
header("Content-Disposition: attachment; filename=FichasDocentes-".date("Y-m-d H:i:s").".zip");
header("Content-Transfer-Encoding: binary");

// Read the file
readfile($nombreArchivoZip);
exit;