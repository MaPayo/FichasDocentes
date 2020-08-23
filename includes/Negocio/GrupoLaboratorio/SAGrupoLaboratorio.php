<?php

namespace es\ucm;

interface SAGrupoLaboratorio
{

    public static function listGrupoLaboratorio($idAsignatura);

    public static function findGrupoLaboratorio($idGrupoLaboratorio);

    public static function findGrupoLaboratorioLetra($comparacion);

    public static function createGrupoLaboratorio($grupoLaboratorio);

    public static function updateGrupoLaboratorio($grupoLaboratorio);

    public static function deleteGrupoLaboratorio($idGrupoLaboratorio);
}
