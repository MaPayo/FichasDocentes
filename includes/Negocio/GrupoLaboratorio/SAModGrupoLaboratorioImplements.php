<?php

namespace es\ucm;

require_once('includes/Negocio/GrupoLaboratorio/SAModGrupoLaboratorio.php');
require_once('includes/Negocio/GrupoLaboratorio/GrupoLaboratorio.php');
require_once('includes/Integracion/Factorias/FactoriesDAOImplements.php');

class SAModGrupoLaboratorioImplements implements SAModGrupoLaboratorio{

    private static $DAOModGrupoLaboratorio;

    public function __construct(){
        $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
        $DAOModGrupoLaboratorio=$factoriesDAO->createDAOModGrupoLaboratorio(); 
    }
    
    
    public static function findModGrupoLaboratorio($idAsignatura){
        $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
        $DAOModGrupoLaboratorio=$factoriesDAO->createDAOModGrupoLaboratorio(); 
        $grupoLaboratorio=$DAOModGrupoLaboratorio->findModGrupoLaboratorio($idAsignatura);
        return $grupoLaboratorio;
    }

    public static function createModGrupoLaboratorio($grupoLaboratorio){
        $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
        $DAOModGrupoLaboratorio=$factoriesDAO->createDAOModGrupoLaboratorio(); 
        $grupoLaboratorio=$DAOModGrupoLaboratorio->createModGrupoLaboratorio($grupoLaboratorio);
        return $grupoLaboratorio;
    }

    public static function updateModGrupoLaboratorio($grupoLaboratorio){
        $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
        $DAOModGrupoLaboratorio=$factoriesDAO->createDAOModGrupoLaboratorio(); 
        $grupoLaboratorio=$DAOModGrupoLaboratorio->updateModGrupoLaboratorio($grupoLaboratorio);
        return $grupoLaboratorio;
    }

    public static function deleteModGrupoLaboratorio($idAsignatura){
        $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
        $DAOModGrupoLaboratorio=$factoriesDAO->createDAOModGrupoLaboratorio(); 
        $grupoLaboratorio=$DAOModGrupoLaboratorio->deleteModGrupoLaboratorio($idAsignatura);
        return $grupoLaboratorio;
    }

}