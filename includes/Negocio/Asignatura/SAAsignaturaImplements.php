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
                $asignatura[0]['Abreviatura'],
                $asignatura[0]['Curso'],
                $asignatura[0]['Semestre'],
                $asignatura[0]['NombreAsignaturaIngles'],
                $asignatura[0]['Creditos'],
                $asignatura[0]['CoordinadorPrincipal'],
                $asignatura[0]['CoordinadorLaboratorio'],
                $asignatura[0]['Estado'],
                $asignatura[0]['IdMateria']
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

    public static function listAsignatura($idMateria)
    {
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOAsignatura = $factoriesDAO->createDAOAsignatura();
        $asignaturas = $DAOAsignatura->listAsignatura($idMateria);
        $arrayAsignaturas = array();
        if ($asignaturas) {
            foreach ($asignaturas as $asignatura) {
                $arrayAsignaturas[] = new Asignatura(
                    $asignatura['IdAsignatura'],
                    $asignatura['NombreAsignatura'],
                    $asignatura['Abreviatura'],
                    $asignatura['Curso'],
                    $asignatura['Semestre'],
                    $asignatura['NombreAsignaturaIngles'],
                    $asignatura['Creditos'],
                    $asignatura['CoordinadorPrincipal'],
                    $asignatura['CoordinadorLaboratorio'],
                    $asignatura['Estado'],
                    $asignatura['IdMateria']
                );
            }
        }
        return $arrayAsignaturas;
    }
}
