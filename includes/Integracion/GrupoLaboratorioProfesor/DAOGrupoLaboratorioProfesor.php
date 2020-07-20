<?php

namespace es\ucm;

interface DAOGrupoLaboratorioProfesor
{
    public static function listGrupoLaboratorioProfesor($idGrupoLab);

    public static function findGrupoLaboratorioProfesor($idGrupoLab, $emailProfesor);

    public static function createGrupoLaboratorioProfesor($grupoLaboratorioProfesor);

    public static function updateGrupoLaboratorioProfesor($grupoLaboratorioProfesor);

    public static function deleteGrupoLaboratorioProfesor($idGrupoLab, $emailProfesor);
}
