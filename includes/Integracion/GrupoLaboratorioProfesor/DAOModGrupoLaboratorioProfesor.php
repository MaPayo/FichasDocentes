<?php

namespace es\ucm;

interface DAOModGrupoLaboratorioProfesor
{
    public static function listModGrupoLaboratorioProfesor($idGrupoLab);

    public static function findModGrupoLaboratorioProfesor($idGrupoLab, $emailProfesor);

    public static function createModGrupoLaboratorioProfesor($modGrupoLaboratorioProfesor);

    public static function updateModGrupoLaboratorioProfesor($modGrupoLaboratorioProfesor);

    public static function deleteModGrupoLaboratorioProfesor($idGrupoLab, $emailProfesor);
}
