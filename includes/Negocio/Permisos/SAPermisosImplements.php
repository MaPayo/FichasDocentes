<?php

namespace es\ucm;
require_once('SAPermisos.php');
class SAPermisosImplements implements SAPermisos{

    private static $DAOPermisos;

    public function __construct(){
        $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
        $DAOPermisos=$factoriesDAO->createDAOPermisos(); 
    }
    
    /*Revisar estos dos ids. TOA?????*/
    public static function findPermisos($idAsignatura,$emailProfesor){
        $permiso=$DAOPermisos->findPermisos($idAsignatura,$emailProfesor);
        return $permiso;
    }

    public static function createPermisos($permiso){
        $permiso=$DAOPermisos->createPermisos($permiso);
        return $permiso;
    }

    public static function updatePermisos($permiso){
        $permiso=$DAOPermisos->updatePermisos($permiso);
        return $permiso;
    }

    public static function deletePermisos($idAsignatura,$emailProfesor){
        $permiso=$DAOPermisos->deletePermisos($idAsignatura,$emailProfesor);
        return $permiso;
    }

}