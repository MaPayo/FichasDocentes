<?php

namespace es\ucm;

interface SAModGrupoClaseProfesor
{
	public static function listModGrupoClaseProfesor($idGrupoClase);

	public static function findModGrupoClaseProfesor($idModGrupoClase, $emailProfesor);

	public static function createModGrupoClaseProfesor($grupoClaseProfesor);

	public static function updateModGrupoClaseProfesor($grupoClaseProfesor);

	public static function deleteModGrupoClaseProfesor($idGrupoClase, $emailProfesor);
}
