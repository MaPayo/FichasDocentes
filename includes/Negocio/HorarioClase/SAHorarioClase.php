<?php

namespace es\ucm;

interface SAGrupoHorarioClase{

    public static function findHorarioClase($idGrupoClase);

    public static function createHorarioClase($aula,$dia,$horaInicio,$horaFin,$idGrupoClase);

    public static function updateHorarioClase($aula,$dia,$horaInicio,$horaFin,$idGrupoClase);
    
    public static function deleteHorarioClase($idGrupoClase);

}