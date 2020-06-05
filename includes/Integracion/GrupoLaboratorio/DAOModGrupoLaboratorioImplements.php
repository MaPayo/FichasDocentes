<?php

namespace es\ucm;

require_once('includes/Integracion/GrupoLaboratorio/DAOModGrupoLaboratorio.php');

class DAOModGrupoLaboratorioImplements implements DAOModGrupoLaboratorio
{


    public static function listModGrupoLaboratorio($idModAsignatura)
    {
        $singletonDataSource = new SingletonDataSource();
        $dataSource = $singletonDataSource->getInstance();
        $sql = "SELECT * FROM modgrupolaboratorio WHERE IdModAsignatura = :idModAsignatura";
        $values = array(':idModAsignatura' => $idModAsignatura);
        $results = $dataSource->executeQuery($sql, $values);
        return $results;
    }

    public static function findModGrupoLaboratorio($idGrupoLaboratorio)
    {
        $singletonDataSource = new SingletonDataSource();
        $dataSource = $singletonDataSource->getInstance();
        $sql = "SELECT * FROM modgrupolaboratorio WHERE IdGrupoLab = :idGrupoLab";
        $values = array(':idGrupoLab' => $idGrupoLaboratorio);
        $results = $dataSource->executeQuery($sql, $values);
        return $results;
    }

    public static function createModGrupoLaboratorio($modGrupoLaboratorio)
    {
        $singletonDataSource = new SingletonDataSource();
        $dataSource = $singletonDataSource->getInstance();
        $sql = "INSERT INTO modgrupolaboratorio (IdGrupoLab,Letra,Idioma,IdModAsignatura) 
        VALUES (:idGrupoLab, :letra, :idioma, :idModAsignatura)";
        $values = array(
            ':idGrupoLab' => $modGrupoLaboratorio->getIdGrupoLab(),
            ':letra' => $modGrupoLaboratorio->getLetra(),
            ':idioma' => $modGrupoLaboratorio->getIdioma(),
            ':idModAsignatura' => $modGrupoLaboratorio->getIdModAsignatura()
        );
        $results = $dataSource->executeInsertUpdateDelete($sql, $values);
        return $results;
    }

    public static function updateModGrupoLaboratorio($modGrupoLaboratorio)
    {
        $singletonDataSource = new SingletonDataSource();
        $dataSource = $singletonDataSource->getInstance();
        $sql = "UPDATE modgrupolaboratorio SET IdGrupoLab = :idGrupoLab, Letra = :letra,Idioma = :idioma,IdModAsignatura = :idModAsignatura WHERE IdGrupoLab = :idGrupoLab";
        $values = array(
            ':idGrupoLab' => $modGrupoLaboratorio->getIdGrupoLab(),
            ':letra' => $modGrupoLaboratorio->getLetra(),
            ':idioma' => $modGrupoLaboratorio->getIdioma(),
            ':idModAsignatura' => $modGrupoLaboratorio->getIdModAsignatura()
        );
        $results = $dataSource->executeInsertUpdateDelete($sql, $values);
        return $results;
    }

    public static function deleteModGrupoLaboratorio($idGrupoLaboratorio)
    {
        $singletonDataSource = new SingletonDataSource();
        $dataSource = $singletonDataSource->getInstance();
        $sql = "DELETE FROM modgrupolaboratorio WHERE IdGrupoLab = :idGrupoLab";
        $values = array(':idGrupoLab' => $idGrupoLaboratorio);
        $results = $dataSource->executeInsertUpdateDelete($sql, $values);
        return $results;
    }
}
