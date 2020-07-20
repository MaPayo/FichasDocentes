<?php

namespace es\ucm;

interface SAModHorarioClase
{

    public static function listModHorarioClase($idGrupoClase);

    public static function findModHorarioClase($idHorarioClase);

    public static function createModHorarioClase($horarioClase);

    public static function updateModHorarioClase($horarioClase);

    public static function deleteModHorarioClase($idHorarioClase);
}
