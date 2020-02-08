<?php

namespace es\ucm;

interface SAModGrupoHorarioClase{

    public static function findModHorarioClase($idGrupoClase);

    public static function createModHorarioClase($horarioClase);

    public static function updateModHorarioClase($horarioClase);
    
    public static function deleteModHorarioClase($idGrupoClase);

}