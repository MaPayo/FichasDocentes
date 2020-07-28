<?php

namespace es\ucm;

require_once('includes/Negocio/Modulo/SAModulo.php');
require_once('includes/Negocio/Modulo/Modulo.php');
require_once('includes/Integracion/Factorias/FactoriesDAOImplements.php');

class SAModuloImplements implements SAModulo
{

    public static function findModulo($idModulo)
    {
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOModulo = $factoriesDAO->createDAOModulo();
        $modulo = $DAOModulo->findModulo($idModulo);
        if ($modulo && count($modulo) === 1) {
            $modulo = new Modulo(
                $modulo[0]['IdModulo'],
                $modulo[0]['NombreModulo'],
                $modulo[0]['CreditosModulo'],
                $modulo[0]['CodigoGrado']
            );
        }
        else{
         $modulo   =null;
        }
        return $modulo;
    }

    public static function createModulo($modulo)
    {
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOModulo = $factoriesDAO->createDAOModulo();
        $modulo = $DAOModulo->createModulo($modulo);
        return $modulo;
    }

    public static function updateModulo($modulo)
    {
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOModulo = $factoriesDAO->createDAOModulo();
        $modulo = $DAOModulo->updateModulo($modulo);
        return $modulo;
    }

    public static function deleteModulo($idModulo)
    {
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOModulo = $factoriesDAO->createDAOModulo();
        $modulo = $DAOModulo->deleteModulo($idModulo);
        return $modulo;
    }

    public static function listModulo($codigoGrado)
    {
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOModulo = $factoriesDAO->createDAOModulo();
        $modulos = $DAOModulo->listModulo($codigoGrado);
        $arrayModulos = array();
        if ($modulos) {
            foreach ($modulos as $modulo) {
                $arrayModulos[] = new Modulo(
                    $modulo['IdModulo'],
                    $modulo['NombreModulo'],
                    $modulo['CreditosModulo'],
                    $modulo['CodigoGrado']
                );
            }
        }
        else{
         $arrayModulos   =null;
        }
        return $arrayModulos;
    }
}
