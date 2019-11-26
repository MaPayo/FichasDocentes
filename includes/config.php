<?php
/**
 * Definicion de parametros de configuracion de aceso a la BD y la URL desde la que se sirve la aplicacion
 */
define('BD_HOST','localhost'); //Direccion IP o URL de la BD de la aplicacion
define('BD_NAME','guiasdoc'); //Nombre de la BD de la aplicacion
define('BD_USER','guiasdoc'); //Nombre de usuario de la BD de la aplicacion
define('BD_PASS','guiasdoc'); //Password del usuario de la BD de la aplicacion
define('RAIZ_APP',__DIR__);
define('RUTA_APP','');
define('RUTA_IMGS',RUTA_APP.'assets/img/');
define('RUTA_CSS',RUTA_APP.'assets/css/');
define('RUTA_JS',RUTA_APP.'assets/js/');
define('INSTALADA',true); //Apaga o enciende la aplicacion

/**
 * Comprueba si la aplicacion esta configurada o no. En cado de no estarlo mostraria un mensaje
 */
if(!INSTALADA){
    echo "La aplicacion no esta configurada";
    exit();
}

/**
 * Configuracion del charset y de la codificacion de la aplicacion
 */
ini_set('default_charset','UTF-8');
setLocale(LC_ALL,'es_ES.UTF.8');
date_default_timezone_set('Europe/Madrid'); //Configuracion de la zona horaria por defecto

/**
 * Funcion para autocargar clases PHP
 */
spl_autoload_register(function($class){
    $prefix='es\\ucm\\'; //prefijo namespace
    $base_dir=__DIR__.'/'; //Directorio base para el prefijo del namespace
    $len=strlen($prefix); //¿La clase usa el prefijo del namespace?
    if(strncmp($prefix,$class,$len) !==0){
        return;
    }
    $relative_class=substr($class,$len); //coge el nombre de clase relativo

    /**
     * Reemplaza el prefijo del namespace con el directorio base, reemplaza los separadores del namespace
     * con separadores de directorios en los relativos nombres de clase, apareciendo con .php 
     */
    $file=$base_dir.str_replace('\\','/',$relative_class).'.php';
    //Si el fichero existe, lo requiere
    if(file_exists($file)){
        require $file;
    }
});

/**
 * Inicializacion del objeto aplicacion
 */
$app=\es\ucm\Aplicacion::getSingleton();
$app->init(array('host'=>BD_HOST,'bd'=>BD_NAME,'user'=>BD_USER,'pass'=>BD_PASS),RUTA_APP,RAIZ_APP);