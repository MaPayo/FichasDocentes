<?php

namespace es\ucm;

interface SAModHorarioLaboratorio
{

    public static function listModHorarioLaboratorio($idGrupoLab);

    public static function findModHorarioLaboratorio($idHorarioLab);

    public static function createModHorarioLaboratorio($horarioLaboratorio);

    public static function updateModHorarioLaboratorio($horarioLaboratorio);

    public static function deleteModHorarioLaboratorio($idGrupoLab);
}
