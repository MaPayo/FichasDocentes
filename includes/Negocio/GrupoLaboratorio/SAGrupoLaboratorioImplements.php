<?php

namespace es\ucm;

require_once('includes/Negocio/GrupoLaboratorio/SAGrupoLaboratorio.php');
require_once('includes/Negocio/GrupoLaboratorio/GrupoLaboratorio.php');
require_once('includes/Integracion/Factorias/FactoriesDAOImplements.php');

class SAGrupoLaboratorioImplements implements SAGrupoLaboratorio{
    
    public static function findGrupoLaboratorio($idAsignatura){
        $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
        $DAOGrupoLaboratorio=$factoriesDAO->createDAOGrupoLaboratorio();
        $grupoLaboratorio=$DAOGrupoLaboratorio->findGrupoLaboratorio($idAsignatura);
        return $grupoLaboratorio;
    }

    public static function createGrupoLaboratorio($grupoLaboratorio){
        $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
        $DAOGrupoLaboratorio=$factoriesDAO->createDAOGrupoLaboratorio();
        $grupoLaboratorio=$DAOGrupoLaboratorio->createGrupoLaboratorio($grupoLaboratorio);
        return $grupoLaboratorio;
    }

    public static function updateGrupoLaboratorio($grupoLaboratorio){
        $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
        $DAOGrupoLaboratorio=$factoriesDAO->createDAOGrupoLaboratorio();
        $grupoLaboratorio=$DAOGrupoLaboratorio->updateGrupoLaboratorio($grupoLaboratorio);
        return $grupoLaboratorio;
    }

    public static function deleteGrupoLaboratorio($idAsignatura){
        $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
        $DAOGrupoLaboratorio=$factoriesDAO->createDAOGrupoLaboratorio();
        $grupoLaboratorio=$DAOGrupoLaboratorio->deleteGrupoLaboratorio($idAsignatura);
        return $grupoLaboratorio;
    }

}