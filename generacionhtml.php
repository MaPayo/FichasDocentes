<?php
require_once('includes/config.php');
require_once('includes/Presentacion/Controlador/Context.php');
require_once('includes/Presentacion/Controlador/ControllerImplements.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guía Docente</title>

    <?php
    echo '<link href="' . RUTA_CSS . 'guiaDocenteTemplate.css" rel="stylesheet" type="text/css" media="screen"/>';
    ?>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet"> 
</head>
<body>
<?php
//$access = new es\ucm\FormVerificacion('idAsignatura');
                  $datosIniciales= array();
                  $datosIniciales['IdAsignatura']=  htmlspecialchars(trim(strip_tags($_GET['idAsignatura'])));
                  $access->gestionaModificacion($datosIniciales);
           
?>

</body>
</html>
