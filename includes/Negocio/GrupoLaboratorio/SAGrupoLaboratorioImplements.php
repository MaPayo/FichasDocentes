<?php

namespace es\ucm;

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

    public static function createGrupoLaboratorio($letra,$idioma,$emailProfesor,$idAsignatura){
        $grupoLaboratorio=new \es\ucm\GrupoLaboratorio($letra,$idioma,$emailProfesor,$idAsignatura);
        $grupoLaboratorio=$DAOGrupoLaboratorio->createGrupoLaboratorio($grupoLaboratorio);
        return $grupoLaboratorio;
    }

    public static function updateGrupoLaboratorio($letra,$idioma,$emailProfesor,$idAsignatura){
        $grupoLaboratorio=new \es\ucm\GrupoLaboratorio($letra,$idioma,$emailProfesor,$idAsignatura);
        $grupoLaboratorio=$DAOGrupoLaboratorio->updateGrupoLaboratorio($grupoLaboratorio);
        return $grupoLaboratorio;
    }

    public static function deleteGrupoLaboratorio($idAsignatura){
        $grupoLaboratorio=$DAOGrupoLaboratorio->deleteGrupoLaboratorio($idAsignatura);
        return $grupoLaboratorio;
    }

}