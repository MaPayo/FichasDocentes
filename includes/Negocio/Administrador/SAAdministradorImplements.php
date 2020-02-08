<?php

namespace es\ucm;

class SAAdministradorImplements implements SAAdministrador{

    private static $DAOAdministrador;

    public function __construct(){
        $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
        $DAOAdministrador=$factoriesDAO->createDAOAdministrador(); 
    }
    
    
    public static function findAdministrador($email){
        
        $administrador= $DAOAdministrador->findAdministrador($email);
        return $administrador;
    }

    public static function createAdministrador($administrador){
        $administrador=$DAOAdministrador->createAdministrador($administrador);
        return $administrador;
    }

    public static function updateAdministrador($administrador){
        $administrador=$DAOAdministrador->updateAdministrador($administrador);
        return $administrador;
    }

    public static function deleteAdministrador($email){
        $administrador=$DAOAdministrador->deleteAdministrador($email);
        return $administrador;
    }

}