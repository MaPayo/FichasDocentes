<?php

namespace es\ucm;

interface SAModHorarioLaboratorio{

    public static function findModHorarioLaboratorio($idGrupoLab);

    public static function createModHorarioLaboratorio($horarioLaboratorio);

    public static function updateModHorarioLaboratorio($horarioLaboratorio);
    
    public static function deleteModHorarioLaboratorio($idGrupoLab);

}