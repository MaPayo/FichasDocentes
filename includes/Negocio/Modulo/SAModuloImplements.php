<?php

namespace es\ucm;
require_once('includes/Negocio/Modulo/SAModulo.php');
require_once('includes/Negocio/Modulo/Modulo.php');
require_once('includes/Integracion/Factorias/FactoriesDAOImplements.php');

class SAModuloImplements implements SAModulo{    
    
    public static function findModulo($idModulo){
        $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
        $DAOModulo=$factoriesDAO->createDAOModulo();
        $modulo= $DAOModulo->findModulo($idModulo);
        return $modulo;
    }

    public static function createModulo($modulo){
        $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
        $DAOModulo=$factoriesDAO->createDAOModulo();
        $modulo= $DAOModulo->createModulo($modulo);
        return $modulo;
    }

    public static function updateModulo($modulo){
        $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
        $DAOModulo=$factoriesDAO->createDAOModulo();
        $modulo= $DAOModulo->updateModulo($modulo);
        return $modulo;
    }

    public static function deleteModulo($idModulo){
        $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
        $DAOModulo=$factoriesDAO->createDAOModulo();
        $modulo= $DAOModulo->deleteModulo($idModulo);
        return $modulo;
    }

}