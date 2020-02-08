<?php

namespace es\ucm;

class SAUsuarioImplements implements SAUsuario{

    private static $DAOUsuario;

    public function __construct(){
        $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
        $DAOUsuario=$factoriesDAO->createDAOUsuario(); 
    }
    
    
    public static function findUsuario($email){
        $usuario=$DAOUsuario->findUsuario($email);
        return $usuario;
    }

    public static function createUsuario($usuario){
        $usuario=$DAOUsuario->createUsuario($usuario);
        return $usuario;
    }

    public static function updateUsuario($usuario){
        $usuario=$DAOUsuario->updateUsuario($usuario);
        return $usuario;
    }

    public static function deleteUsuario($email){
        $usuario=$DAOUsuario->deleteUsuario($email);
        return $usuario;
    }

}