<?php

namespace es\ucm;

interface SAHorarioLaboratorio
{

    public static function listHorarioLaboratorio($idGrupoLab);

    public static function findHorarioLaboratorio($idHorarioLab);

    public static function findHorarioLaboratorioGrupoyDia($comparacion);

    public static function createHorarioLaboratorio($horarioLaboratorio);

    public static function updateHorarioLaboratorio($horarioLaboratorio);

    public static function deleteHorarioLaboratorio($idHorarioLab);
}
