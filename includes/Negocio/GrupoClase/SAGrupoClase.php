<?php

namespace es\ucm;

interface SAGrupoClase{

    public static function findGrupoClase($idAsignatura);

    public static function createGrupoClase($letra,$idioma,$emailProfesor,$idAsignatura);

    public static function updateGrupoClase($letra,$idioma,$emailProfesor,$idAsignatura);
    
    public static function deleteGrupoClase($idAsignatura);

}