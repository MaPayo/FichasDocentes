<?php

namespace es\ucm;

require_once('includes/Integracion/GrupoClase/DAOModGrupoClase.php');

class DAOModGrupoClaseImplements implements DAOModGrupoClase
{
    public static function listModGrupoClase($idModAsignatura)
    {
        $singletonDataSource = new SingletonDataSource();
        $dataSource = $singletonDataSource->getInstance();
        $sql = "SELECT * FROM modgrupoclase WHERE IdModAsignatura = :idModAsignatura";
        $values = array(':idModAsignatura' => $idModAsignatura);
        $results = $dataSource->executeQuery($sql, $values);
        return $results;
    }

    public static function findModGrupoClase($idGrupoClase)
    {
        $singletonDataSource = new SingletonDataSource();
        $dataSource = $singletonDataSource->getInstance();
        $sql = "SELECT * FROM modgrupoclase WHERE IdGrupoClase = :idGrupoClase";
        $values = array(':idGrupoClase' => $idGrupoClase);
        $results = $dataSource->executeQuery($sql, $values);
        return $results;
    }

    public static function createModGrupoClase($modGrupoClase)
    {
        $singletonDataSource = new SingletonDataSource();
        $dataSource = $singletonDataSource->getInstance();
        $sql = "INSERT INTO modgrupoclase (IdGrupoClase,Letra,Idioma,IdModAsignatura) 
        VALUES (:idGrupoClase, :letra, :idioma, :idModAsignatura)";
        $values = array(
            ':idGrupoClase' => $modGrupoClase->getIdGrupoClase(),
            ':letra' => $modGrupoClase->getLetra(),
            ':idioma' => $modGrupoClase->getIdioma(),
            ':idModAsignatura' => $modGrupoClase->getIdModAsignatura()
        );
        $results = $dataSource->executeInsertUpdateDelete($sql, $values);
        return $results;
    }

    public static function updateModGrupoClase($modGrupoClase)
    {
        $singletonDataSource = new SingletonDataSource();
        $dataSource = $singletonDataSource->getInstance();
        $sql = "UPDATE modgrupoclase SET IdGrupoClase = :idGrupoClase, Letra = :letra,Idioma = :idioma,IdModAsignatura = :idModAsignatura WHERE IdGrupoClase = :idGrupoClase";
        $values = array(
            ':idGrupoClase' => $modGrupoClase->getIdGrupoClase(),
            ':letra' => $modGrupoClase->getLetra(),
            ':idioma' => $modGrupoClase->getIdioma(),
            ':idModAsignatura' => $modGrupoClase->getIdModAsignatura()
        );
        $results = $dataSource->executeInsertUpdateDelete($sql, $values);
        return $results;
    }

    public static function deleteModGrupoClase($idGrupoClase)
    {
        $singletonDataSource = new SingletonDataSource();
        $dataSource = $singletonDataSource->getInstance();
        $sql = "DELETE FROM modgrupoclase WHERE IdGrupoClase = :idGrupoClase";
        $values = array(':idGrupoClase' => $idGrupoClase);
        $results = $dataSource->executeInsertUpdateDelete($sql, $values);
        return $results;
    }
}
