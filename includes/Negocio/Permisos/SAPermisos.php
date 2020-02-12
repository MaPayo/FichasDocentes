<?php

namespace es\ucm;

interface SAPermisos{

    public static function findPermisos($idAsignatura,$emailProfesor);

    public static function createPermisos($permiso);

    public static function updatePermisos($permiso);
    
    public static function deletePermisos($idAsignatura,$emailProfesor);

}