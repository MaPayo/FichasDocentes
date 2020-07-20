<?php

namespace es\ucm;

interface SAHorarioClase
{

    public static function listHorarioClase($idGrupoClase);

    public static function findHorarioClase($idHorarioClase);

    public static function createHorarioClase($horarioClase);

    public static function updateHorarioClase($horarioClase);

    public static function deleteHorarioClase($idHorarioClase);
}
