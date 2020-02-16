<?php

namespace es\ucm;
require_once('SAModGrupoClase.php');

class SAModGrupoClaseImplements implements SAModGrupoClase{

    private static $DAOModGrupoClase;

    public function __construct(){
        $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
        $DAOModGrupoClase=$factoriesDAO->createDAOModGrupoClase(); 
    }
    
    
    public static function findModGrupoClase($idAsignatura){
        $grupoClase=$DAOModGrupoClase->findModGrupoClase($idAsignatura);
        return $grupoClase;
    }

    public static function createModGrupoClase($grupoClase){
        $grupoClase=$DAOModGrupoClase->createModGrupoClase($grupoClase);
        return $grupoClase;
    }

    public static function updateModGrupoClase($grupoClase){
        $grupoClase=$DAOModGrupoClase->updateModGrupoClase($grupoClase);
        return $grupoClase;
    }

    public static function deleteModGrupoClase($idAsignatura){
        $grupoClase=$DAOModGrupoClase->deleteModGrupoClase($idAsignatura);
        return $grupoClase;
    }

}