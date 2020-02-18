<?php

namespace es\ucm;

require_once('includes/Negocio/Asignatura/SAAsignatura.php');
require_once('includes/Negocio/Asignatura/Asignatura.php');
require_once('includes/Integracion/Factorias/FactoriesDAOImplements.php');

class SAAsignaturaImplements implements SAAsignatura
{

    public static function findAsignatura($idAsignatura)
    {
        $factoriesDAO = new FactoriesDAOImplements();
        $DAOAsignatura = $factoriesDAO->createDAOAsignatura();
        $asignatura = $DAOAsignatura->findAsignatura($idAsignatura);
        if ($asignatura && count($asignatura) === 1) {
            $asignatura = new Asignatura(
                $asignatura[0]['IdAsignatura'],
                $asignatura[0]['NombreAsignatura'],
                $asignatura[0]['Materia'],
                $asignatura[0]['Modulo'],
                $asignatura[0]['Caracter'],
                $asignatura[0]['Curso'],
                $asignatura[0]['Semestre'],
                $asignatura[0]['NombreAsignaturaIngles'],
                $asignatura[0]['CreditosMateria'],
                $asignatura[0]['Creditos'],
                $asignatura[0]['Coordinadores'],
                $asignatura[0]['CodigoGrado']
            );
        }
        return $asignatura;
    }

    public static function createAsignatura($asignatura)
    {
        $factoriesDAO = new FactoriesDAOImplements();
        $DAOAsignatura = $factoriesDAO->createDAOAsignatura();
        $asignatura = $DAOAsignatura->createAsignatura($asignatura);
        return $asignatura;
    }

    public static function updateAsignatura($asignatura)
    {
        $factoriesDAO = new FactoriesDAOImplements();
        $DAOAsignatura = $factoriesDAO->createDAOAsignatura();
        $asignatura = $DAOAsignatura->createAsignatura($asignatura);
        return $asignatura;
    }

    public static function deleteAsignatura($idAsignatura)
    {
        $factoriesDAO = new FactoriesDAOImplements();
        $DAOAsignatura = $factoriesDAO->createDAOAsignatura();
        $asignatura = $DAOAsignatura->deleteAsignatura($idAsignatura);
        return $asignatura;
    }
}
