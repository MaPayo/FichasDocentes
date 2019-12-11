<?php
namespace es\ucm;

interface DAOGrupoClase{
    public static function findGrupoClase($idGrupoClase);

    public static function createGrupoClase($GrupoClase);

    public static function updateGrupoClase($GrupoClase);
    
    public static function deleteGrupoClase($idGrupoClase);
}