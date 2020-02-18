<?php

namespace es\ucm;

require_once('includes/Negocio/Leyenda/SALeyenda.php');
require_once('includes/Negocio/Leyenda/Leyenda.php');
require_once('includes/Integracion/Factorias/FactoriesDAOImplements.php');

class SALeyendaImplements implements SALeyenda{

    public static function findLeyenda($idLeyenda){
        $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
        $DAOLeyenda=$factoriesDAO->createDAOLeyenda();
        $leyenda=$DAOLeyenda->findLeyenda($idLeyenda);
        return $leyenda;
    }

    public static function createLeyenda($leyenda){
        $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
        $DAOLeyenda=$factoriesDAO->createDAOLeyenda();
        $leyenda=$DAOLeyenda->createLeyenda($leyenda);
        return $leyenda;
    }

    public static function updateLeyenda($leyenda){
        $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
        $DAOLeyenda=$factoriesDAO->createDAOLeyenda();
        $leyenda=$DAOLeyenda->updateLeyenda($leyenda);
        return $leyenda;
    }

    public static function deleteLeyenda($idLeyenda){
        $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
        $DAOLeyenda=$factoriesDAO->createDAOLeyenda();
        $leyenda=$DAOLeyenda->deleteLeyenda($idLeyenda);
        return $leyenda;
    }

}