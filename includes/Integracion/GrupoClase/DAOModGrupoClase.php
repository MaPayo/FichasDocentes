<?php
namespace es\ucm;

interface DAOModGrupoClase{
    public static function findModGrupoClase($idModGrupoClase);

    public static function createModGrupoClase($ModGrupoClase);

    public static function updateModGrupoClase($ModGrupoClase);
    
    public static function deleteModGrupoClase($idModGrupoClase);
}