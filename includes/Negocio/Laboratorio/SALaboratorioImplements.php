<?php

namespace es\ucm;

require_once('includes/Negocio/Laboratorio/SALaboratorio.php');
require_once('includes/Negocio/Laboratorio/Laboratorio.php');
require_once('includes/Integracion/Factorias/FactoriesDAOImplements.php');

class SALaboratorioImplements implements SALaboratorio
{

    public static function findLaboratorio($idAsignatura)
    {
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOLaboratorio = $factoriesDAO->createDAOLaboratorio();
        $laboratorio = $DAOLaboratorio->findLaboratorio($idAsignatura);
        if ($laboratorio && count($laboratorio) === 1) {
            $laboratorio = new Laboratorio(
                $laboratorio[0]['IdLaboratorio'],
                $laboratorio[0]['Creditos'],
                $laboratorio[0]['Presencial'],
                $laboratorio[0]['IdAsignatura']
            );
        }
        else{
         $laboratorio   =null;
        }
        return $laboratorio;
    }

    public static function createLaboratorio($laboratorio)
    {
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOLaboratorio = $factoriesDAO->createDAOLaboratorio();
        $laboratorio = $DAOLaboratorio->createLaboratorio($laboratorio);
        return $laboratorio;
    }

    public static function updateLaboratorio($laboratorio)
    {
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOLaboratorio = $factoriesDAO->createDAOLaboratorio();
        $laboratorio = $DAOLaboratorio->updateLaboratorio($laboratorio);
        return $laboratorio;
    }

    public static function deleteLaboratorio($idAsignatura)
    {
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOLaboratorio = $factoriesDAO->createDAOLaboratorio();
        $laboratorio = $DAOLaboratorio->deleteLaboratorio($idAsignatura);
        return $laboratorio;
    }
}
