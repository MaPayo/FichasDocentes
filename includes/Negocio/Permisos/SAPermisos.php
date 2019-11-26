<?php

namespace es\ucm;

interface SAPermisos{

    public static function findPermiso($idAsignatura,$emailProfesor);

    public static function createPermiso($permiso,$idAsignatura,$emailProfesor);

    public static function updatePermiso($permiso,$idAsignatura,$emailProfesor);
    
    public static function deletePermiso($idAsignatura,$emailProfesor);

}