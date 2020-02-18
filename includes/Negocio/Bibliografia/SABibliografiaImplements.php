<?php

namespace es\ucm;
require_once('includes/Negocio/Bibliografia/SABibliografia.php');
require_once('includes/Negocio/Bibliografia/Bibliografia.php');
require_once('includes/Integracion/Factorias/FactoriesDAOImplements.php');

class SABibliografiaImplements implements SABibliografia{
    
    public static function findBibliografia($idBibliografia){
        $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
        $DAOBibliografia=$factoriesDAO->createDAOBibliografia();
        $bibliografia=$DAOBibliografia->findBibliografia($idBibliografia);
        return $bibliografia;
    }

    public static function createBibliografia($bibliografia){
        $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
        $DAOBibliografia=$factoriesDAO->createDAOBibliografia();
        $bibliografia=$DAOBibliografia->createBibliografia($bibliografia);
        return $bibliografia;
    }

    public static function updateBibliografia($bibliografia){
        $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
        $DAOBibliografia=$factoriesDAO->createDAOBibliografia();
        $bibliografia=$DAOBibliografia->updateBibliografia($bibliografia);
        return $bibliografia;
    }

    public static function deleteBibliografia($idBibliografia){
        $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
        $DAOBibliografia=$factoriesDAO->createDAOBibliografia();
        $bibliografia=$DAOBibliografia->deleteBibliografia($idBibliografia);
        return $bibliografia;
    }

}