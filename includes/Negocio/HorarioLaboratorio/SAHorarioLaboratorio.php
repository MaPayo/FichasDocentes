<?php

namespace es\ucm;

interface SAHorarioLaboratorio{

    public static function findHorarioLaboratorio($idGrupoLab);

    public static function createHorarioLaboratorio($laboratorio,$dia,$horaInicio,$horaFin,$idGrupoLab);

    public static function updateHorarioLaboratorio($laboratorio,$dia,$horaInicio,$horaFin,$idGrupoLab);
    
    public static function deleteHorarioLaboratorio($idGrupoLab);

}