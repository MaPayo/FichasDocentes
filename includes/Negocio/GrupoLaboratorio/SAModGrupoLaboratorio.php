<?php

namespace es\ucm;

interface SAModGrupoLaboratorio{

    public static function findModGrupoLaboratorio($idAsignatura);

    public static function createModGrupoLaboratorio($grupoLaboratorio);

    public static function updateModGrupoLaboratorio($grupoLaboratorio);
    
    public static function deleteModGrupoLaboratorio($idAsignatura);

}