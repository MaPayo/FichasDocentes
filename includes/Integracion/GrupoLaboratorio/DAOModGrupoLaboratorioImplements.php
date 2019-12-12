<?php
namespace es\ucm;

class DAOModGrupoLaboratorioImplements implements DAOModGrupoLaboratorio{


    public static function findModGrupoLaboratorio($idGrupoLab){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="SELECT * FROM modGrupoLaboratorio WHERE IdGrupoLab = :idGrupoLab";
        $values=array(':idGrupoLab' => $idGrupoLab);
        $results=$dataSource->executeQuery($sql,$values);
        return $results;

    }

    public static function createModGrupoLaboratorio($modGrupoLaboratorio){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="INSERT INTO modGrupoLaboratorio (IdGrupoLab,Letra,Idioma,IdModAsignatura) 
        VALUES (:idGrupoLab, :letra, :idioma, :idModAsignatura)";
        $values=array(':idGrupoLab' => $modGrupoLaboratorio->getIdGrupoLab(),
            ':letra' => $modGrupoLaboratorio->getLetra(),
            ':idioma' => $modGrupoLaboratorio->getIdioma(),
            ':idModAsignatura' => $modGrupoLaboratorio->getIdModAsignatura());
        $results=$dataSource->executeQuery($sql,$values);
        return $results;

    }

    public static function updateModGrupoLaboratorio($modGrupoLaboratorio){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="UPDATE modGrupoLaboratorio SET IdGrupoLab = :idGrupoLab, Letra = :letra,Idioma = :idioma,IdModAsignatura = :idModAsignatura WHERE IdGrupoLab = :idGrupoLab";
        $values=array(':idModGrupoLaboratorio' => $modGrupoLaboratorio->getIdGrupoLab(),
            ':letra' => $modGrupoLaboratorio->getLetra(),
            ':idioma' => $modGrupoLaboratorio->getIdioma(),
            ':idModAsignatura' => $modGrupoLaboratorio->getIdModAsignatura());
        $results=$dataSource->executeQuery($sql,$values);
        return $results;
    }

    public static function deleteModGrupoLaboratorio($idGrupoLab){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="DELETE FROM modGrupoLaboratorio WHERE IdGrupoLab = :idGrupoLab";
        $values=array(':idGrupoLab' => $idGrupoLab);
        $results=$dataSource->executeQuery($sql,$values);
        return $results;
    }
}