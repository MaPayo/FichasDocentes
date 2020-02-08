<?php

namespace es\ucm;

interface SAHorarioLaboratorio{

    public static function findHorarioLaboratorio($idGrupoLab);

    public static function createHorarioLaboratorio($horarioLaboratorio);

    public static function updateHorarioLaboratorio($horarioLaboratorio);
    
    public static function deleteHorarioLaboratorio($idGrupoLab);

}