<?php

namespace es\ucm;

interface SAModGrupoClase
{

    public static function listModGrupoClase($idModAsignatura);

    public static function findModGrupoClase($idGrupoClase);

    public static function createModGrupoClase($grupoClase);

    public static function updateModGrupoClase($grupoClase);

    public static function deleteModGrupoClase($idGrupoClase);
}
