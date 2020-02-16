<?php

namespace es\ucm;
require_once('SAGrupoLaboratorio.php');

class SAGrupoLaboratorioImplements implements SAGrupoLaboratorio{

    private static $DAOGrupoLaboratorio;

    public function __construct(){
        $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
        $DAOGrupoLaboratorio=$factoriesDAO->createDAOGrupoLaboratorio(); 
    }
    
    
    public static function findGrupoLaboratorio($idAsignatura){
        $grupoLaboratorio=$DAOGrupoLaboratorio->findGrupoLaboratorio($idAsignatura);
        return $grupoLaboratorio;
    }

    public static function createGrupoLaboratorio($grupoLaboratorio){
        $grupoLaboratorio=$DAOGrupoLaboratorio->createGrupoLaboratorio($grupoLaboratorio);
        return $grupoLaboratorio;
    }

    public static function updateGrupoLaboratorio($grupoLaboratorio){
        $grupoLaboratorio=$DAOGrupoLaboratorio->updateGrupoLaboratorio($grupoLaboratorio);
        return $grupoLaboratorio;
    }

    public static function deleteGrupoLaboratorio($idAsignatura){
        $grupoLaboratorio=$DAOGrupoLaboratorio->deleteGrupoLaboratorio($idAsignatura);
        return $grupoLaboratorio;
    }

}