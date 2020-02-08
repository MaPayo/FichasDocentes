<?php

namespace es\ucm;

interface SAGrupoClase{

    public static function findGrupoClase($idAsignatura);

    public static function createGrupoClase($grupoClase);

    public static function updateGrupoClase($grupoClase);
    
    public static function deleteGrupoClase($idAsignatura);

}