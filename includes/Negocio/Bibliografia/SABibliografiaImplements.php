<?php

namespace es\ucm;

class SABibliografiaImplements implements SABibliografia{

    private static $DAOBibliografia;

    public function __construct(){
        $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
        $DAOBibliografia=$factoriesDAO->createDAOBibliografia(); 
    }
    
    
    public static function findBibliografia($idAsignatura){
        $bibliografia=$DAOBibliografia->findBibliografia($idAsignatura);
        return $bibliografia;
    }

    public static function createBibliografia($citasBibliograficas,$recursosInternet,$idAsignatura){
        $bibliografia=new \es\ucm\Bibliografia($citasBibliograficas,$recursosInternet,$idAsignatura);
        $bibliografia=$DAOBibliografia->createBibliografia($bibliografia);
        return $bibliografia;
    }

    public static function updateBibliografia($citasBibliograficas,$recursosInternet,$idAsignatura){
        $bibliografia=new \es\ucm\Bibliografia($citasBibliograficas,$recursosInternet,$idAsignatura);
        $bibliografia=$DAOBibliografia->updateBibliografia($bibliografia);
        return $bibliografia;
    }

    public static function deleteBibliografia($idAsignatura){
        $bibliografia=$DAOBibliografia->deleteBibliografia($idAsignatura);
        return $bibliografia;
    }

}