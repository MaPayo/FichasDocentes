<?php

namespace es\ucm;

class SALeyendaImplements implements SALeyenda{

    private static $DAOLeyenda;

    public function __construct(){
        $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
        $DAOLeyenda=$factoriesDAO->createDAOLeyenda(); 
    }
    
    
    public static function findLeyenda($idLeyenda){
        $leyenda=$DAOLeyenda->findLeyenda($idLeyenda);
        return $leyenda;
    }

    public static function createLeyenda($leyenda){
        $leyenda=$DAOLeyenda->createLeyenda($leyenda);
        return $leyenda;
    }

    public static function updateLeyenda($leyenda){
        $leyenda=$DAOLeyenda->updateLeyenda($leyenda);
        return $leyenda;
    }

    public static function deleteLeyenda($idLeyenda){
        $leyenda=$DAOLeyenda->deleteLeyenda($idLeyenda);
        return $leyenda;
    }

}