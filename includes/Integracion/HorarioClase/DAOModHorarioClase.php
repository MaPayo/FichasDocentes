<?php

namespace es\ucm;

interface DAOModHorarioClase
{
    public static function listModHorarioClase($idGrupoClase);

    public static function findModHorarioClase($idHorarioClase);

    public static function createModHorarioClase($modHorarioClase);

    public static function updateModHorarioClase($modHorarioClase);

    public static function deleteModHorarioClase($idHorarioClase);
}
