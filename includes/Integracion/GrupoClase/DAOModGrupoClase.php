<?php

namespace es\ucm;

interface DAOModGrupoClase
{
    public static function listModGrupoClase($idModAsignatura);

    public static function findModGrupoClase($idGrupoClase);

    public static function createModGrupoClase($modGrupoClase);

    public static function updateModGrupoClase($modGrupoClase);

    public static function deleteModGrupoClase($idGrupoClase);
}
