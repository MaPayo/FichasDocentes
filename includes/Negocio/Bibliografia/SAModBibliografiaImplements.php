<?php

namespace es\ucm;

require_once('includes/Negocio/Bibliografia/SAModBibliografia.php');
require_once('includes/Negocio/Bibliografia/Bibliografia.php');
require_once('includes/Integracion/Factorias/FactoriesDAOImplements.php');

class SAModBibliografiaImplements implements SAModBibliografia{

    public static function findModBibliografia($idBibliografia){
        $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
        $DAOBibliografia=$factoriesDAO->createDAOModBibliografia(); 
        $bibliografia=$DAOBibliografia->findModBibliografia($idBibliografia);
        return $bibliografia;
    }

    public static function createModBibliografia($bibliografia){
        $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
        $DAOBibliografia=$factoriesDAO->createDAOModBibliografia(); 
        $bibliografia=$DAOBibliografia->createModBibliografia($bibliografia);
        return $bibliografia;
    }

    public static function updateModBibliografia($bibliografia){
        $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
        $DAOBibliografia=$factoriesDAO->createDAOModBibliografia(); 
        $bibliografia=$DAOBibliografia->updateModBibliografia($bibliografia);
        return $bibliografia;
    }

    public static function deleteModBibliografia($idBibliografia){
        $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
        $DAOBibliografia=$factoriesDAO->createDAOModBibliografia(); 
        $bibliografia=$DAOBibliografia->deleteModBibliografia($idBibliografia);
        return $bibliografia;
    }

}