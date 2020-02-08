<?php

namespace es\ucm;

interface SAPermisos{

    public static function findPermiso($idAsignatura,$emailProfesor);

    public static function createPermiso($permiso);

    public static function updatePermiso($permiso);
    
    public static function deletePermiso($idAsignatura,$emailProfesor);

}