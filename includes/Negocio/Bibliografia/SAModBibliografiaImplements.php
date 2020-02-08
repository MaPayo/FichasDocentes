<?php

namespace es\ucm;

class SAModBibliografiaImplements implements SAModBibliografia{

    private static $DAOMOdBibliografia;

    public function __construct(){
        $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
        $DAOBibliografia=$factoriesDAO->createDAOModBibliografia(); 
    }
    
    
    public static function findModBibliografia($idBibliografia){
        $bibliografia=$DAOModBibliografia->findModBibliografia($idBibliografia);
        return $bibliografia;
    }

    public static function createModBibliografia($bibliografia){
        $bibliografia=$DAOModBibliografia->createModBibliografia($bibliografia);
        return $bibliografia;
    }

    public static function updateModBibliografia($bibliografia){
        $bibliografia=$DAOModBibliografia->updateModBibliografia($bibliografia);
        return $bibliografia;
    }

    public static function deleteModBibliografia($idBibliografia){
        $bibliografia=$DAOModBibliografia->deleteModBibliografia($idBibliografia);
        return $bibliografia;
    }

}