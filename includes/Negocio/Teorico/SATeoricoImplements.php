<?php

namespace es\ucm;

require_once('includes/Negocio/Teorico/SATeorico.php');
require_once('includes/Negocio/Teorico/Teorico.php');
require_once('includes/Integracion/Factorias/FactoriesDAOImplements.php');

class SATeoricoImplements implements SATeorico
{

    public static function findTeorico($idAsignatura)
    {
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOTeorico = $factoriesDAO->createDAOTeorico();
        $teorico = $DAOTeorico->findTeorico($idAsignatura);
        if ($teorico && count($teorico) === 1) {
            $teorico = new Teorico(
                $teorico[0]['IdTeorico'],
                $teorico[0]['Creditos'],
                $teorico[0]['Presencial'],
                $teorico[0]['IdAsignatura']
            );
        }
        else{
         $teorico   =null;
        }
        return $teorico;
    }

    public static function createTeorico($teorico)
    {
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOTeorico = $factoriesDAO->createDAOTeorico();
        $teorico = $DAOTeorico->createTeorico($teorico);
        return $teorico;
    }

    public static function updateTeorico($teorico)
    {
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOTeorico = $factoriesDAO->createDAOTeorico();
        $teorico = $DAOTeorico->updateTeorico($teorico);
        return $teorico;
    }

    public static function deleteTeorico($idAsignatura)
    {
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOTeorico = $factoriesDAO->createDAOTeorico();
        $teorico = $DAOTeorico->deleteTeorico($idAsignatura);
        return $teorico;
    }
}
