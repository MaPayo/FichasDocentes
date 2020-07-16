<?php

namespace es\ucm;

require_once('includes/Negocio/ProgramaAsignatura/SAProgramaAsignatura.php');
require_once('includes/Negocio/ProgramaAsignatura/ProgramaAsignatura.php');
require_once('includes/Integracion/Factorias/FactoriesDAOImplements.php');

class SAProgramaAsignaturaImplements implements SAProgramaAsignatura{
    
    
    public static function findProgramaAsignatura($idAsignatura){
        $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
        $DAOProgramaAsignatura=$factoriesDAO->createDAOProgramaAsignatura();
        $programaAsignatura=$DAOProgramaAsignatura->findProgramaAsignatura($idAsignatura);
        if ($programaAsignatura && count($programaAsignatura) === 1) {
            $programaAsignatura = new ProgramaAsignatura(
                $programaAsignatura[0]['IdPrograma'],
                $programaAsignatura[0]['ConocimientosPrevios'],
                $programaAsignatura[0]['ConocimientosPreviosi'],
                $programaAsignatura[0]['BreveDescripcion'],
                $programaAsignatura[0]['BreveDescripcioni'],
<<<<<<< Updated upstream
                $programaAsignatura[0]['ProgramaDetallado'],
                $programaAsignatura[0]['ProgramaDetalladoi'],
=======
                $programaAsignatura[0]['ProgramaTeorico'],
                $programaAsignatura[0]['ProgramaTeoricoi'],
                $programaAsignatura[0]['ProgramaSeminarios'],
                $programaAsignatura[0]['ProgramaSeminariosi'],
                $programaAsignatura[0]['ProgramaLaboratorio'],
                $programaAsignatura[0]['ProgramaLaboratorioi'],
>>>>>>> Stashed changes
                $programaAsignatura[0]['IdAsignatura']
            );
        }
        return $programaAsignatura;
    }

    public static function createProgramaAsignatura($programaAsignatura){
        $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
        $DAOProgramaAsignatura=$factoriesDAO->createDAOProgramaAsignatura();
        $programaAsignatura=$DAOProgramaAsignatura->createProgramaAsignatura($programaAsignatura);
        return $programaAsignatura;
    }

    public static function updateProgramaAsignatura($programaAsignatura){
        $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
        $DAOProgramaAsignatura=$factoriesDAO->createDAOProgramaAsignatura();
        $programaAsignatura=$DAOProgramaAsignatura->updateProgramaAsignatura($programaAsignatura);
        return $programaAsignatura;
    }

    public static function deleteProgramaAsignatura($idAsignatura){
        $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
        $DAOProgramaAsignatura=$factoriesDAO->createDAOProgramaAsignatura();
        $programaAsignatura=$DAOProgramaAsignatura->deleteProgramaAsignatura($idAsignatura);
        return $programaAsignatura;
    }

}