<?php

namespace es\ucm;

interface SAModGrupoLaboratorio{

    public static function listModGrupoLaboratorio($idModAsignatura);

    public static function findModGrupoLaboratorio($idGrupoLaboratorio);

    public static function createModGrupoLaboratorio($grupoLaboratorio);

    public static function updateModGrupoLaboratorio($grupoLaboratorio);
    
    public static function deleteModGrupoLaboratorio($idGrupoLaboratorio);

}