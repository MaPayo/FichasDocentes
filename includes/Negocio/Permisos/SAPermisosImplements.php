<?php

namespace es\ucm;

require_once('includes/Negocio/Permisos/SAPermisos.php');
require_once('includes/Negocio/Permisos/Permisos.php');
require_once('includes/Integracion/Factorias/FactoriesDAOImplements.php');

class SAPermisosImplements implements SAPermisos
{

    public static function findPermisos($permiso)
    {
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOPermisos = $factoriesDAO->createDAOPermisos();
        $permiso = $DAOPermisos->findPermisos($permiso); 
        return $permiso;
    }

    public static function findPermisosPorProfesor($permiso){
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOPermisos = $factoriesDAO->createDAOPermisos();
        $permiso = $DAOPermisos->findPermisosPorProfesor($permiso);
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

    public static function deletePermisos($permiso)
    {
        $factoriesDAO = new \es\ucm\FactoriesDAOImplements();
        $DAOPermisos = $factoriesDAO->createDAOPermisos();
        $permiso = $DAOPermisos->deletePermisos($permiso);
        return $permiso;
    }

   
}
