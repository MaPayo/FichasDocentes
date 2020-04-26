<?php
namespace es\ucm;

interface DAOModGrupoLaboratorio{
    public static function listModGrupoLaboratorio($idModAsignatura);

    public static function findModGrupoLaboratorio($idGrupoLaboratorio);

    public static function createModGrupoLaboratorio($modGrupoLaboratorio);

    public static function updateModGrupoLaboratorio($modGrupoLaboratorio);
    
    public static function deleteModGrupoLaboratorio($idGrupoLaboratorio);
}