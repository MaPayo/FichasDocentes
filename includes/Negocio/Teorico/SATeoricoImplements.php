<?php

namespace es\ucm;

class SATeoricoImplements implements SATeorico{

    private static $DAOTeorico;

    public function __construct(){
        $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
        $DAOTeorico=$factoriesDAO->createDAOTeorico(); 
    }
    
    
    public static function findTeorico($idAsignatura){
        $teorico=$DAOTeorico->findTeorico($idAsignatura);
        return $teorico;
    }

    public static function createTeorico($teorico){
        $teorico=$DAOTeorico->createTeorico($teorico);
        return $teorico;
    }

    public static function updateTeorico($teorico){
        $teorico=$DAOTeorico->updateTeorico($teorico);
        return $teorico;
    }

    public static function deleteTeorico($idAsignatura){
        $teorico=$DAOTeorico->deleteTeorico($idAsignatura);
        return $teorico;
    }

}