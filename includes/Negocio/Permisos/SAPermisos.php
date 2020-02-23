<?php

namespace es\ucm;

interface SAPermisos{

    public static function findPermisos($permiso);

    public static function createPermisos($permiso);

    public static function updatePermisos($permiso);
    
    public static function deletePermisos($permiso);

    public static function findPermisosPorProfesor($permiso);

}