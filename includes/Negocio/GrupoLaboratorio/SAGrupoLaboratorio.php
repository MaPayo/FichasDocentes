<?php

namespace es\ucm;

interface SAGrupoLaboratorio{

    public static function findGrupoLaboratorio($idAsignatura);

    public static function createGrupoLaboratorio($letra,$idioma,$emailProfesor,$idAsignatura);

    public static function updateGrupoLaboratorio($letra,$idioma,$emailProfesor,$idAsignatura);
    
    public static function deleteGrupoLaboratorio($idAsignatura);

}