<?php
namespace es\ucm;

interface DAOHorarioClase{
    public static function findHorarioClase($idHorarioClase);

    public static function createHorarioClase($HorarioClase);

    public static function updateHorarioClase($HorarioClase);
    
    public static function deleteHorarioClase($idHorarioClase);
}