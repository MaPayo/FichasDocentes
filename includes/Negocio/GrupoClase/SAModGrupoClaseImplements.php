<?php

namespace es\ucm;

require_once('includes/Negocio/GrupoClase/SAModGrupoClase.php');
require_once('includes/Negocio/GrupoClase/GrupoClase.php');
require_once('includes/Integracion/Factorias/FactoriesDAOImplements.php');

class SAModGrupoClaseImplements implements SAModGrupoClase{

    private static $DAOModGrupoClase;

    public function __construct(){
        $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
        $DAOModGrupoClase=$factoriesDAO->createDAOModGrupoClase(); 
    }
    
    
    public static function findModGrupoClase($idAsignatura){
        $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
        $DAOModGrupoClase=$factoriesDAO->createDAOModGrupoClase();
        $grupoClase=$DAOModGrupoClase->findModGrupoClase($idAsignatura);
        return $grupoClase;
    }

    public static function createModGrupoClase($grupoClase){
        $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
        $DAOModGrupoClase=$factoriesDAO->createDAOModGrupoClase();
        $grupoClase=$DAOModGrupoClase->createModGrupoClase($grupoClase);
        return $grupoClase;
    }

    public static function updateModGrupoClase($grupoClase){
        $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
        $DAOModGrupoClase=$factoriesDAO->createDAOModGrupoClase();
        $grupoClase=$DAOModGrupoClase->updateModGrupoClase($grupoClase);
        return $grupoClase;
    }

    public static function deleteModGrupoClase($idAsignatura){
        $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
        $DAOModGrupoClase=$factoriesDAO->createDAOModGrupoClase();
        $grupoClase=$DAOModGrupoClase->deleteModGrupoClase($idAsignatura);
        return $grupoClase;
    }

}