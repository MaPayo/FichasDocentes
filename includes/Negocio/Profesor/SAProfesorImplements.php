<?php

namespace es\ucm;

require_once('includes/Negocio/Profesor/SAProfesor.php');
require_once('includes/Negocio/Profesor/Profesor.php');
require_once('includes/Integracion/Factorias/FactoriesDAOImplements.php');

class SAProfesorImplements implements SAProfesor
{

    public static function findProfesor($emailProfesor)
    {
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOProfesor = $factoriesDAO->createDAOProfesor();
        $profesor = $DAOProfesor->findProfesor($emailProfesor);
        if ($profesor && count($profesor) === 1) {
            $profesor = new Profesor(
                $profesor[0]['Email'],
                $profesor[0]['Nombre'],
                $profesor[0]['Departamento'],
                $profesor[0]['Despacho'],
                $profesor[0]['Tutoria'],
                $profesor[0]['Facultad']
            );
        }
        else{
         $profesor   =null;
        }
        return $profesor;
    }

    public static function createProfesor($profesor)
    {
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOProfesor = $factoriesDAO->createDAOProfesor();
        $profesor = $DAOProfesor->createProfesor($profesor);
        return $profesor;
    }

    public static function updateProfesor($profesor)
    {
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOProfesor = $factoriesDAO->createDAOProfesor();
        $profesor = $DAOProfesor->updateProfesor($profesor);
        return $profesor;
    }

    public static function deleteProfesor($emailProfesor)
    {
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOProfesor = $factoriesDAO->createDAOProfesor();
        $profesor = $DAOProfesor->deleteProfesor($emailProfesor);
        return $profesor;
    }
}
