<?php

namespace es\ucm;
require_once('includes/Negocio/Administrador/SAAdministrador.php');
require_once('includes/Negocio/Administrador/Administrador.php');
require_once('includes/Integracion/Factorias/FactoriesDAOImplements.php');

class SAAdministradorImplements implements SAAdministrador{    
    
    public static function findAdministrador($email){
        $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
        $DAOAdministrador=$factoriesDAO->createDAOAdministrador();
        $administrador= $DAOAdministrador->findAdministrador($email);
        return $administrador;
    }

    public static function createAdministrador($administrador){
        $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
        $DAOAdministrador=$factoriesDAO->createDAOAdministrador();
        $administrador=$DAOAdministrador->createAdministrador($administrador);
        return $administrador;
    }

    public static function updateAdministrador($administrador){
        $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
        $DAOAdministrador=$factoriesDAO->createDAOAdministrador();
        $administrador=$DAOAdministrador->updateAdministrador($administrador);
        return $administrador;
    }

    public static function deleteAdministrador($email){
        $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
        $DAOAdministrador=$factoriesDAO->createDAOAdministrador();
        $administrador=$DAOAdministrador->deleteAdministrador($email);
        return $administrador;
    }

}