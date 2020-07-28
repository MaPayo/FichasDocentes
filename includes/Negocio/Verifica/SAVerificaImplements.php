<?php

namespace es\ucm;

require_once('includes/Negocio/Verifica/SAVerifica.php');
require_once('includes/Negocio/Verifica/Verifica.php');
require_once('includes/Integracion/Factorias/FactoriesDAOImplements.php');

class SAVerificaImplements implements SAVerifica
{

    public static function findVerifica($idAsignatura)
    {
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOVerifica = $factoriesDAO->createDAOVerifica();
        $verifica = $DAOVerifica->findVerifica($idAsignatura);
        if ($verifica && count($verifica) === 1) {
            $verifica = new Verifica(
                $verifica[0]['IdVerifica'],
                $verifica[0]['MaximoExamenes'],
                $verifica[0]['MinimoExamenes'],
                $verifica[0]['MaximoActividades'],
                $verifica[0]['MinimoActividades'],
                $verifica[0]['MaximoLaboratorio'],
                $verifica[0]['MinimoLaboratorio'],
                $verifica[0]['IdAsignatura']
            );
        }
        else{
         $verifica   =null;
        }
        return $verifica;
    }

    public static function createVerifica($verifica)
    {
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOVerifica = $factoriesDAO->createDAOVerifica();
        $verifica = $DAOVerifica->createVerifica($verifica);
        return $verifica;
    }

    public static function updateVerifica($verifica)
    {
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOVerifica = $factoriesDAO->createDAOVerifica();
        $verifica = $DAOVerifica->updateVerifica($verifica);
        return $verifica;
    }

    public static function deleteVerifica($idAsignatura)
    {
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOVerifica = $factoriesDAO->createDAOVerifica();
        $verifica = $DAOVerifica->deleteVerifica($idAsignatura);
        return $verifica;
    }
}
