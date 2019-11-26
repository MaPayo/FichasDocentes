<?php

namespace es\ucm;

class SAAdministradorImplements implements SAAdministrador{

    private static $DAOAdministrador;

    public function __construct(){
        $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
        $DAOAdministrador=$factoriesDAO->createDAOAdministrador(); 
    }
    
    
    public static function findAdministrador($email){
        $administrador=$DAOAdministrador->findAdministrador($email);
        return $administrador;
    }

    public static function createAdministrador($email,$nombre){
        $administrador=new \es\ucm\Administrador($email,$nombre);
        $administrador=$DAOAdministrador->createAdministrador($administrador);
        return $administrador;
    }

    public static function updateAdministrador($email,$nombre){
        $administrador=new \es\ucm\Administrador($email,$nombre);
        $administrador=$DAOAdministrador->updateAdministrador($administrador);
        return $administrador;
    }

    public static function deleteAdministrador($email){
        $administrador=$DAOAdministrador->deleteAdministrador($email);
        return $administrador;
    }

}