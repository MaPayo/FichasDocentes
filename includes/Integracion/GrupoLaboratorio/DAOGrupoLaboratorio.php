<?php
namespace es\ucm;

interface DAOGrupoLaboratorio{
    public static function findGrupoLaboratorio($idGrupoLaboratorio);

    public static function createGrupoLaboratorio($GrupoLaboratorio);

    public static function updateGrupoLaboratorio($GrupoLaboratorio);
    
    public static function deleteGrupoLaboratorio($idGrupoLaboratorio);
}