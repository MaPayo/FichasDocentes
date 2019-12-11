<?php
namespace es\ucm;

class DAOGrupoLaboratorioImplements implements DAOGrupoLaboratorio{


    public static function findGrupoLaboratorio($idGrupoLab){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="SELECT * FROM grupoLaboratorio WHERE IdGrupoLab = :idGrupoLab";
        $values=array(':idGrupoLab' => $idGrupoLab);
        $results=$dataSource->executeQuery($sql,$values);
        return $results;

    }

    public static function createGrupoLaboratorio($grupoLaboratorio){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="INSERT INTO grupoLaboratorio (IdGrupoLab,Letra,Idioma,IdAsignatura) 
        VALUES (:idGrupoLab, :letra, :idioma, :idAsignatura)";
        $values=array(':idGrupoLab' => $grupoLaboratorio->getIdGrupoLab(),
            ':letra' => $grupoLaboratorio->getLetra(),
            ':idioma' => $grupoLaboratorio->getIdioma(),
            ':idAsignatura' => $grupoLaboratorio->getIdAsignatura());
        $results=$dataSource->executeQuery($sql,$values);
        return $results;

    }

    public static function updateGrupoLaboratorio($grupoLaboratorio){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="UPDATE grupoLaboratorio SET IdGrupoLab = :idGrupoLab, Letra = :letra,Idioma = :idioma,IdAsignatura = :idAsignatura WHERE IdGrupoLab = :idGrupoLab";
        $values=array(':idGrupoLaboratorio' => $grupoLaboratorio->getIdGrupoLab(),
            ':letra' => $grupoLaboratorio->getLetra(),
            ':idioma' => $grupoLaboratorio->getIdioma(),
            ':idAsignatura' => $grupoLaboratorio->getIdAsignatura());
        $results=$dataSource->executeQuery($sql,$values);
        return $results;
    }

    public static function deleteGrupoLaboratorio($idGrupoLab){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="DELETE FROM grupoLaboratorio WHERE IdGrupoLab = :idGrupoLab";
        $values=array(':idGrupoLab' => $idGrupoLab);
        $results=$dataSource->executeQuery($sql,$values);
        return $results;
    }
}