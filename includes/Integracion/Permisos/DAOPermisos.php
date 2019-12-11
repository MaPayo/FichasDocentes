<?php
namespace es\ucm;

interface DAOPermisos{
    public static function findPermisos($idPermisos);

    public static function createPermisos($Permisos);

    public static function updatePermisos($Permisos);
    
    public static function deletePermisos($idPermisos);
}