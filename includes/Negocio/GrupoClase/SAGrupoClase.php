<?php

namespace es\ucm;

interface SAGrupoClase
{

    public static function listGrupoClase($idAsignatura);

    public static function findGrupoClase($idGrupoClase);

    public static function findGrupoClaseLetra($comparacion);

    public static function createGrupoClase($grupoClase);

    public static function updateGrupoClase($grupoClase);

    public static function deleteGrupoClase($idGrupoClase);
}
