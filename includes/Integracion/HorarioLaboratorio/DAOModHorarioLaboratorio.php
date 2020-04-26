<?php
namespace es\ucm;

interface DAOModHorarioLaboratorio{
    public static function listModHorarioLaboratorio($idGrupoLaboratorio);

    public static function findModHorarioLaboratorio($idHorarioLaboratorio);

    public static function createModHorarioLaboratorio($modHorarioLaboratorio);

    public static function updateModHorarioLaboratorio($modHorarioLaboratorio);
    
    public static function deleteModHorarioLaboratorio($idHorarioLaboratorio);
}