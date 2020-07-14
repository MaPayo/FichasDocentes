<?php

namespace es\ucm;

require_once('includes/Integracion/GrupoClase/DAOGrupoClase.php');

class DAOGrupoClaseImplements implements DAOGrupoClase
{
    public static function listGrupoClase($idAsignatura)
    {
        $singletonDataSource = new SingletonDataSource();
        $dataSource = $singletonDataSource->getInstance();
        $sql = "SELECT * FROM grupoclase WHERE IdAsignatura = :idAsignatura";
        $values = array(':idAsignatura' => $idAsignatura);
        $results = $dataSource->executeQuery($sql, $values);
        return $results;
    }

    public static function findGrupoClase($idGrupoClase)
    {
        $singletonDataSource = new SingletonDataSource();
        $dataSource = $singletonDataSource->getInstance();
        $sql = "SELECT * FROM grupoclase WHERE IdGrupoClase = :idGrupoClase";
        $values = array(':idGrupoClase' => $idGrupoClase);
        $results = $dataSource->executeQuery($sql, $values);
        return $results;
    }

    public static function createGrupoClase($grupoClase)
    {
        $singletonDataSource = new SingletonDataSource();
        $dataSource = $singletonDataSource->getInstance();
        $sql = "INSERT INTO grupoclase (IdGrupoClase,Letra,Idioma,IdAsignatura) 
        VALUES (:idGrupoClase, :letra, :idioma, :idAsignatura)";
        $values = array(
            ':idGrupoClase' => $grupoClase->getIdGrupoClase(),
            ':letra' => $grupoClase->getLetra(),
            ':idioma' => $grupoClase->getIdioma(),
            ':idAsignatura' => $grupoClase->getIdAsignatura()
        );
        $results = $dataSource->executeInsertUpdateDelete($sql, $values);
        return $results;
    }

    public static function updateGrupoClase($grupoClase)
    {
        $singletonDataSource = new SingletonDataSource();
        $dataSource = $singletonDataSource->getInstance();
        $sql = "UPDATE grupoclase SET IdGrupoClase = :idGrupoClase, Letra = :letra,Idioma = :idioma,IdAsignatura = :idAsignatura WHERE IdGrupoClase = :idGrupoClase";
        $values = array(
            ':idGrupoClase' => $grupoClase->getIdGrupoClase(),
            ':letra' => $grupoClase->getLetra(),
            ':idioma' => $grupoClase->getIdioma(),
            ':idAsignatura' => $grupoClase->getIdAsignatura()
        );
        $results = $dataSource->executeInsertUpdateDelete($sql, $values);
        return $results;
    }

    public static function deleteGrupoClase($idGrupoClase)
    {
        $singletonDataSource = new SingletonDataSource();
        $dataSource = $singletonDataSource->getInstance();
        $sql = "DELETE FROM grupoclase WHERE IdGrupoClase = :idGrupoClase";
        $values = array(':idGrupoClase' => $idGrupoClase);
        $results = $dataSource->executeInsertUpdateDelete($sql, $values);
        return $results;
    }
}
