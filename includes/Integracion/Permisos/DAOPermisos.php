<?php

namespace es\ucm;

interface DAOPermisos
{
    public static function findPermisos($idAsignatura);

    public static function createPermisos($permisos);

    public static function updatePermisos($permisos);

    public static function deletePermisos($idPermisos);

    public static function findPermisosPorProfesor($emailProfesor);

    public static function findPermisosPorProfesorYAsignatura($emailProfesor, $idAsignatura);
}
