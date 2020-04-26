<?php
namespace es\ucm;

interface DAOModGrupoClaseProfesor{
    public static function listModGrupoClaseProfesor($idGrupoClase);

    public static function findModGrupoClaseProfesor($idGrupoClase, $emailProfesor);

    public static function createModGrupoClaseProfesor($modGrupoClaseProfesor);

    public static function updateModGrupoClaseProfesor($modGrupoClaseProfesor);
    
    public static function deleteModGrupoClaseProfesor($idGrupoClase, $emailProfesor);
}