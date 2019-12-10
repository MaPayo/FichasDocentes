<?php
namespace es\ucm;

interface DAOModHorarioLaboratorio{
    public static function findModHorarioLaboratorio($idModHorarioLaboratorio);

    public static function createModHorarioLaboratorio($ModHorarioLaboratorio);

    public static function updateModHorarioLaboratorio($ModHorarioLaboratorio);
    
    public static function deleteModHorarioLaboratorio($idModHorarioLaboratorio);
}