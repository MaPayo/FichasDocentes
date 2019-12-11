<?php
namespace es\ucm;

interface DAOModHorarioClase{
    public static function findModHorarioClase($idModHorarioClase);

    public static function createModHorarioClase($ModHorarioClase);

    public static function updateModHorarioClase($ModHorarioClase);
    
    public static function deleteModHorarioClase($idModHorarioClase);
}