<?php

namespace es\ucm;
require_once('includes/Negocio/Materia/SAMateria.php');
require_once('includes/Negocio/Materia/Materia.php');
require_once('includes/Integracion/Factorias/FactoriesDAOImplements.php');

class SAMateriaImplements implements SAMateria{    
    
    public static function findMateria($idMateria){
        $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
        $DAOMateria=$factoriesDAO->createDAOMateria();
        $materia= $DAOMateria->findMateria($idMateria);
        return $materia;
    }

    public static function createMateria($materia){
        $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
        $DAOMateria=$factoriesDAO->createDAOMateria();
        $materia= $DAOMateria->createMateria($materia);
        return $materia;
    }

    public static function updateMateria($materia){
        $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
        $DAOMateria=$factoriesDAO->createDAOMateria();
        $materia= $DAOMateria->updateMateria($materia);
        return $materia;
    }

    public static function deleteMateria($idMateria){
        $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
        $DAOMateria=$factoriesDAO->createDAOMateria();
        $materia= $DAOMateria->deleteMateria($idMateria);
        return $materia;
    }

}