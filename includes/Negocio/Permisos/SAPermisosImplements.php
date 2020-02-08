<?php

namespace es\ucm;

class SAPermisosImplements implements SAPermisos{

    private static $DAOPermisos;

    public function __construct(){
        $factoriesDAO=new \es\ucm\FactoriesDAOImplements();
        $DAOPermisos=$factoriesDAO->createDAOPermiso(); 
    }
    
    /*Revisar estos dos ids. TOA?????*/
    public static function findPermiso($idAsignatura,$emailProfesor){
        $permiso=$DAOPermisos->findPermiso($idAsignatura,$emailProfesor);
        return $permiso;
    }

    public static function createPermiso($permiso){
        $permiso=$DAOPermisos->createModAsignatura($permiso);
        return $permiso;
    }

    public static function updatePermiso($permiso){
        $permiso=$DAOPermisos->updatePermiso($permiso);
        return $permiso;
    }

    public static function deletePermiso($idAsignatura,$emailProfesor){
        $permiso=$DAOPermisos->deletePermiso($idAsignatura,$emailProfesor);
        return $permiso;
    }

}