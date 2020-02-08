<?php

namespace es\ucm;

class SABibliografiaImplements implements SABibliografia{

    private static $DAOBibliografia;

    public function __construct(){
        $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
        $DAOBibliografia=$factoriesDAO->createDAOBibliografia(); 
    }
    
    
    public static function findBibliografia($idBibliografia){
        $bibliografia=$DAOBibliografia->findBibliografia($idBibliografia);
        return $bibliografia;
    }

    public static function createBibliografia($bibliografia){
        $bibliografia=$DAOBibliografia->createBibliografia($bibliografia);
        return $bibliografia;
    }

    public static function updateBibliografia($bibliografia){
        $bibliografia=$DAOBibliografia->updateBibliografia($bibliografia);
        return $bibliografia;
    }

    public static function deleteBibliografia($idBibliografia){
        $bibliografia=$DAOBibliografia->deleteBibliografia($idBibliografia);
        return $bibliografia;
    }

}