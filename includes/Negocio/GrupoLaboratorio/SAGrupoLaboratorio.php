<?php

namespace es\ucm;

interface SAGrupoLaboratorio{

    public static function findGrupoLaboratorio($idAsignatura);

    public static function createGrupoLaboratorio($grupoLaboratorio);

    public static function updateGrupoLaboratorio($grupoLaboratorio);
    
    public static function deleteGrupoLaboratorio($idAsignatura);

}