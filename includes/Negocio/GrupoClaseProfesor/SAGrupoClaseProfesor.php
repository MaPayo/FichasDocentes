<?php

namespace es\ucm;

interface SAGrupoClaseProfesor{
	public static function listGrupoClaseProfesor($idGrupoClase);

	public static function findGrupoClaseProfesor($idGrupoClase, $emailProfesor);

	public static function createGrupoClaseProfesor($grupoClaseProfesor);

	public static function updateGrupoClaseProfesor($grupoClaseProfesor);

	public static function deleteGrupoClaseProfesor($idGrupoClase, $emailProfesor);
}