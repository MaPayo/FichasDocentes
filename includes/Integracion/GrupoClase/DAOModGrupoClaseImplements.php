<?php
namespace es\ucm;

class DAOModGrupoClaseImplements implements DAOModGrupoClase{


    public static function findModGrupoClase($idGrupoClase){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="SELECT * FROM modGrupoClase WHERE IdGrupoClase = :idGrupoClase";
        $values=array(':idGrupoClase' => $idGrupoClase);
        $results=$dataSource->executeQuery($sql,$values);
        return $results;

    }

    public static function createModGrupoClase($modGrupoClase){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="INSERT INTO modGrupoClase (IdGrupoClase,Letra,Idioma,IdModAsignatura) 
        VALUES (:idGrupoClase, :letra, :idioma, :idModAsignatura)";
        $values=array(':idGrupoClase' => $modGrupoClase->getIdGrupoClase(),
            ':letra' => $modGrupoClase->getLetra(),
            ':idioma' => $modGrupoClase->getIdioma(),
            ':idModAsignatura' => $modGrupoClase->getIdModAsignatura());
        $results=$dataSource->executeQuery($sql,$values);
        return $results;

    }

    public static function updateModGrupoClase($modGrupoClase){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="UPDATE modGrupoClase SET IdGrupoClase = :idGrupoClase, Letra = :letra,Idioma = :idioma,IdModAsignatura = :idModAsignatura WHERE IdGrupoClase = :idGrupoClase";
        $values=array(':idGrupoClase' => $modGrupoClase->getIdGrupoClase(),
            ':letra' => $modGrupoClase->getLetra(),
            ':idioma' => $modGrupoClase->getIdioma(),
            ':idModAsignatura' => $modGrupoClase->getIdModAsignatura());
        $results=$dataSource->executeQuery($sql,$values);
        return $results;
    }

    public static function deleteModGrupoClase($idGrupoClase){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="DELETE FROM modGrupoClase WHERE IdGrupoClase = :idGrupoClase";
        $values=array(':idGrupoClase' => $idGrupoClase);
        $results=$dataSource->executeQuery($sql,$values);
        return $results;
    }
}