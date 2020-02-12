<?php

namespace es\ucm;

require_once('includes/Negocio/Usuario/SAUsuario.php');
require_once('includes/Integracion/Factorias/FactoriesDAOImplements.php');

class SAUsuarioImplements implements SAUsuario{
    /*private static $DAOUsuario;

    public function __construct(){
        $factoriaDAO=new \es\ucm\FactoriesDAOImplements();
        $this->DAOUsuario=$factoriaDAO->createDAOUsuario();
    }*/
    
    
    public static function findUsuario($email){
        $factoriaDAO=new \es\ucm\FactoriesDAOImplements();
        $DAOUsuario=$factoriaDAO->createDAOUsuario();
        $usuario=$DAOUsuario->findUsuario($email);
        //$usuario=DAOUsuarioImplements::findUsuario($email);
        return $usuario;
    }

    public static function createUsuario($usuario){
        $usuario=$this->DAOUsuario->createUsuario($usuario);
        return $usuario;
    }

    public static function updateUsuario($usuario){
        $usuario=$this->DAOUsuario->updateUsuario($usuario);
        return $usuario;
    }

    public static function deleteUsuario($email){
        $usuario=$this->DAOUsuario->deleteUsuario($email);
        return $usuario;
    }

}