<?php

namespace es\ucm;

interface DAOGrupoLaboratorio
{
    public static function listGrupoLaboratorio($idAsignatura);

    public static function findGrupoLaboratorio($idGrupoLaboratorio);

    public static function createGrupoLaboratorio($grupoLaboratorio);

    public static function updateGrupoLaboratorio($grupoLaboratorio);

    public static function deleteGrupoLaboratorio($idGrupoLaboratorio);
}
