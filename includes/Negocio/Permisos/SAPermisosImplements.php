<?php

namespace es\ucm;

require_once('includes/Negocio/Permisos/SAPermisos.php');
require_once('includes/Negocio/Permisos/Permisos.php');
require_once('includes/Integracion/Factorias/FactoriesDAOImplements.php');

class SAPermisosImplements implements SAPermisos
{

    /*Revisar estos dos ids. TOA?????*/
    public static function findPermisos($idAsignatura, $emailProfesor)
    {
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOPermisos = $factoriesDAO->createDAOPermisos();
        $permiso = $DAOPermisos->findPermisos($idAsignatura, $emailProfesor);
        return $permiso;
    }

    public static function createPermisos($permiso)
    {
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOPermisos = $factoriesDAO->createDAOPermisos();
        $permiso = $DAOPermisos->createPermisos($permiso);
        return $permiso;
    }

    public static function updatePermisos($permiso)
    {
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOPermisos = $factoriesDAO->createDAOPermisos();
        $permiso = $DAOPermisos->updatePermisos($permiso);
        return $permiso;
    }

    public static function deletePermisos($idAsignatura, $emailProfesor)
    {
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOPermisos = $factoriesDAO->createDAOPermisos();
        $permiso = $DAOPermisos->deletePermisos($idAsignatura, $emailProfesor);
        return $permiso;
    }
}
