<?php
namespace es\ucm;

interface DAOHorarioLaboratorio{
    public static function findHorarioLaboratorio($idHorarioLaboratorio);

    public static function createHorarioLaboratorio($HorarioLaboratorio);

    public static function updateHorarioLaboratorio($HorarioLaboratorio);
    
    public static function deleteHorarioLaboratorio($idHorarioLaboratorio);
}