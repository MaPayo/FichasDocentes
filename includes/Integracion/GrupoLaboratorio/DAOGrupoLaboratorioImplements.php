<?php

namespace es\ucm;

require_once('includes/Integracion/GrupoLaboratorio/DAOGrupoLaboratorio.php');

class DAOGrupoLaboratorioImplements implements DAOGrupoLaboratorio
{
    public static function listGrupoLaboratorio($idAsignatura)
    {
        $singletonDataSource = new SingletonDataSource();
        $dataSource = $singletonDataSource->getInstance();
        $sql = "SELECT * FROM grupolaboratorio WHERE IdAsignatura = :idAsignatura";
        $values = array(':idAsignatura' => $idAsignatura);
        $results = $dataSource->executeQuery($sql, $values);
        return $results;
    }

    public static function findGrupoLaboratorio($idGrupoLaboratorio)
    {
        $singletonDataSource = new SingletonDataSource();
        $dataSource = $singletonDataSource->getInstance();
        $sql = "SELECT * FROM grupolaboratorio WHERE IdGrupoLab = :idGrupoLab";
        $values = array(':idGrupoLab' => $idGrupoLaboratorio);
        $results = $dataSource->executeQuery($sql, $values);
        return $results;
    }

    public static function createGrupoLaboratorio($grupoLaboratorio)
    {
        $singletonDataSource = new SingletonDataSource();
        $dataSource = $singletonDataSource->getInstance();
        $sql = "INSERT INTO grupolaboratorio (IdGrupoLab,Letra,Idioma,IdAsignatura) 
        VALUES (:idGrupoLab, :letra, :idioma, :idAsignatura, )";
        $values = array(
            ':idGrupoLab' => $grupoLaboratorio->getIdGrupoLab(),
            ':letra' => $grupoLaboratorio->getLetra(),
            ':idioma' => $grupoLaboratorio->getIdioma(),
            ':idAsignatura' => $grupoLaboratorio->getIdAsignatura()
        );
        $results = $dataSource->executeInsertUpdateDelete($sql, $values);
        return $results;
    }

    public static function updateGrupoLaboratorio($grupoLaboratorio)
    {
        $singletonDataSource = new SingletonDataSource();
        $dataSource = $singletonDataSource->getInstance();
        $sql = "UPDATE grupolaboratorio SET IdGrupoLab = :idGrupoLab, Letra = :letra,Idioma = :idioma,IdAsignatura = :idAsignatura WHERE IdGrupoLab = :idGrupoLab";
        $values = array(
            ':idGrupoLab' => $grupoLaboratorio->getIdGrupoLab(),
            ':letra' => $grupoLaboratorio->getLetra(),
            ':idioma' => $grupoLaboratorio->getIdioma(),
            ':idAsignatura' => $grupoLaboratorio->getIdAsignatura()
        );
        $results = $dataSource->executeInsertUpdateDelete($sql, $values);
        return $results;
    }

    public static function deleteGrupoLaboratorio($idGrupoLaboratorio)
    {
        $singletonDataSource = new SingletonDataSource();
        $dataSource = $singletonDataSource->getInstance();
        $sql = "DELETE FROM grupolaboratorio WHERE IdGrupoLab = :idGrupoLab";
        $values = array(':idGrupoLab' => $idGrupoLaboratorio);
        $results = $dataSource->executeInsertUpdateDelete($sql, $values);
        return $results;
    }
}
