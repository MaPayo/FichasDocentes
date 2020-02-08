<?php

namespace es\ucm;

class SAModGrupoLaboratorioImplements implements SAModGrupoLaboratorio{

    private static $DAOModGrupoLaboratorio;

    public function __construct(){
        $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
        $DAOModGrupoLaboratorio=$factoriesDAO->createDAOModGrupoLaboratorio(); 
    }
    
    
    public static function findModGrupoLaboratorio($idAsignatura){
        $grupoLaboratorio=$DAOModGrupoLaboratorio->findModGrupoLaboratorio($idAsignatura);
        return $grupoLaboratorio;
    }

    public static function createModGrupoLaboratorio($grupoLaboratorio){
        $grupoLaboratorio=$DAOModGrupoLaboratorio->createModGrupoLaboratorio($grupoLaboratorio);
        return $grupoLaboratorio;
    }

    public static function updateModGrupoLaboratorio($grupoLaboratorio){
        $grupoLaboratorio=$DAOModGrupoLaboratorio->updateModGrupoLaboratorio($grupoLaboratorio);
        return $grupoLaboratorio;
    }

    public static function deleteModGrupoLaboratorio($idAsignatura){
        $grupoLaboratorio=$DAOModGrupoLaboratorio->deleteModGrupoLaboratorio($idAsignatura);
        return $grupoLaboratorio;
    }

}