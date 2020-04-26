<?php
namespace es\ucm;

interface DAOHorarioLaboratorio{
    public static function listHorarioLaboratorio($idGrupoLaboratorio);

    public static function findHorarioLaboratorio($idHorarioLaboratorio);

    public static function createHorarioLaboratorio($horarioLaboratorio);

    public static function updateHorarioLaboratorio($horarioLaboratorio);
    
    public static function deleteHorarioLaboratorio($idHorarioLaboratorio);
}