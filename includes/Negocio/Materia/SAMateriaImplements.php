<?php

namespace es\ucm;

require_once('includes/Negocio/Materia/SAMateria.php');
require_once('includes/Negocio/Materia/Materia.php');
require_once('includes/Integracion/Factorias/FactoriesDAOImplements.php');

class SAMateriaImplements implements SAMateria
{

    public static function findMateria($idMateria)
    {
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOMateria = $factoriesDAO->createDAOMateria();
        $materia = $DAOMateria->findMateria($idMateria);
        if ($materia && count($materia) === 1) {
            $materia = new Materia(
                $materia[0]['IdMateria'],
                $materia[0]['NombreMateria'],
                $materia[0]['Caracter'],
                $materia[0]['CreditosMateria'],
                $materia[0]['IdModulo']
            );
        }
        else{
         $materia   =null;
        }
        return $materia;
    }

    public static function createMateria($materia)
    {
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOMateria = $factoriesDAO->createDAOMateria();
        $materia = $DAOMateria->createMateria($materia);
        return $materia;
    }

    public static function updateMateria($materia)
    {
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOMateria = $factoriesDAO->createDAOMateria();
        $materia = $DAOMateria->updateMateria($materia);
        return $materia;
    }

    public static function deleteMateria($idMateria)
    {
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOMateria = $factoriesDAO->createDAOMateria();
        $materia = $DAOMateria->deleteMateria($idMateria);
        return $materia;
    }

    public static function listMateria($idModulo)
    {
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOMateria = $factoriesDAO->createDAOMateria();
        $materias = $DAOMateria->listMateria($idModulo);
        $arrayMaterias = array();
        if ($materias) {
            foreach ($materias as $materia) {
                $arrayMaterias[] = new Materia(
                    $materia['IdMateria'],
                    $materia['NombreMateria'],
                    $materia['Caracter'],
                    $materia['CreditosMateria'],
                    $materia['IdModulo']
                );
            }
        }
        else{
         $arrayMaterias   =null;
        }
        return $arrayMaterias;
    }
}
