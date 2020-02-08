<?php

namespace es\ucm;

class SAGrupoClaseImplements implements SAGrupoClase{

    private static $DAOGrupoClase;

    public function __construct(){
        $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
        $DAOGrupoClase=$factoriesDAO->createDAOGrupoClase(); 
    }
    
    
    public static function findGrupoClase($idAsignatura){
        $grupoClase=$DAOGrupoClase->findGrupoClase($idAsignatura);
        return $grupoClase;
    }

    public static function createGrupoClase($grupoClase){
        $grupoClase=$DAOGrupoClase->createGrupoClase($grupoClase);
        return $grupoClase;
    }

    public static function updateGrupoClase($grupoClase){
        $grupoClase=$DAOGrupoClase->updateGrupoClase($grupoClase);
        return $grupoClase;
    }

    public static function deleteGrupoClase($idAsignatura){
        $grupoClase=$DAOGrupoClase->deleteGrupoClase($idAsignatura);
        return $grupoClase;
    }

}