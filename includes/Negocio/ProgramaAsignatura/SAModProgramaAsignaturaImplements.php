<?php

namespace es\ucm;

require_once('includes/Negocio/ProgramaAsignatura/SAModProgramaAsignatura.php');
require_once('includes/Negocio/ProgramaAsignatura/ProgramaAsignatura.php');
require_once('includes/Integracion/Factorias/FactoriesDAOImplements.php');

class SAModProgramaAsignaturaImplements implements SAModProgramaAsignatura{
    
    public static function findModProgramaAsignatura($idModAsignatura){
        $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
        $DAOModProgramaAsignatura=$factoriesDAO->createDAOModProgramaAsignatura();
        $programaAsignatura=$DAOModProgramaAsignatura->findModProgramaAsignatura($idModAsignatura);
        if ($programaAsignatura && count($programaAsignatura) === 1) {
            $programaAsignatura = new ProgramaAsignatura(
                $programaAsignatura[0]['IdPrograma'],
                $programaAsignatura[0]['ConocimientosPrevios'],
                $programaAsignatura[0]['ConocimientosPreviosi'],
                $programaAsignatura[0]['BreveDescripcion'],
                $programaAsignatura[0]['BreveDescripcioni'],
                $programaAsignatura[0]['ProgramaDetallado'],
                $programaAsignatura[0]['ProgramaDetalladoi'],
                $programaAsignatura[0]['IdModAsignatura']
            );
        }
        return $programaAsignatura;
    }

    public static function createModProgramaAsignatura($modProgramaAsignatura){
        $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
        $DAOModProgramaAsignatura=$factoriesDAO->createDAOModProgramaAsignatura();
        $programaAsignatura=$DAOModProgramaAsignatura->createModProgramaAsignatura($modProgramaAsignatura);
        return $programaAsignatura;
    }

    public static function updateModProgramaAsignatura($modProgramaAsignatura){
        $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
        $DAOModProgramaAsignatura=$factoriesDAO->createDAOModProgramaAsignatura();
        $programaAsignatura=$DAOModProgramaAsignatura->updateModProgramaAsignatura($modProgramaAsignatura);
        return $programaAsignatura;
    }

    public static function deleteModProgramaAsignatura($idModAsignatura){
        $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
        $DAOModProgramaAsignatura=$factoriesDAO->createDAOModProgramaAsignatura();
        $programaAsignatura=$DAOModProgramaAsignatura->deleteModProgramaAsignatura($idModAsignatura);
        return $programaAsignatura;
    }

}