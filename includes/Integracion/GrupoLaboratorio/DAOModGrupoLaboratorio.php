<?php
namespace es\ucm;

interface DAOModGrupoLaboratorio{
    public static function findModGrupoLaboratorio($idModGrupoLaboratorio);

    public static function createModGrupoLaboratorio($ModGrupoLaboratorio);

    public static function updateModGrupoLaboratorio($ModGrupoLaboratorio);
    
    public static function deleteModGrupoLaboratorio($idModGrupoLaboratorio);
}