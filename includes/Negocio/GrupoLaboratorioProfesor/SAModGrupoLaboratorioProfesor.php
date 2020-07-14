<?php

namespace es\ucm;

interface SAModGrupoLaboratorioProfesor
{
	public static function listModGrupoLaboratorioProfesor($idGrupoLab);

	public static function findModGrupoLaboratorioProfesor($idModGrupoLab, $emailProfesor);

	public static function createModGrupoLaboratorioProfesor($grupoLaboratorioProfesor);

	public static function updateModGrupoLaboratorioProfesor($grupoLaboratorioProfesor);

	public static function deleteModGrupoLaboratorioProfesor($idGrupoLab, $emailProfesor);
}
