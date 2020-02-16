<?php

namespace es\ucm;

interface SAHorarioClase{

    public static function findHorarioClase($idGrupoClase);

    public static function createHorarioClase($horarioClase);

    public static function updateHorarioClase($horarioClase);
    
    public static function deleteHorarioClase($idGrupoClase);

}