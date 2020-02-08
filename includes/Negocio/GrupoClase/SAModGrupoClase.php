<?php

namespace es\ucm;

interface SAModGrupoClase{

    public static function findModGrupoClase($idAsignatura);

    public static function createModGrupoClase($grupoClase);

    public static function updateModGrupoClase($grupoClase);
    
    public static function deleteModGrupoClase($idAsignatura);

}