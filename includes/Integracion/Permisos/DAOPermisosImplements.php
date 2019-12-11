<?php
namespace es\ucm;

class DAOPermisosImplements implements DAOPermisos{


    public static function findPermisos($idPermiso){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="SELECT * FROM permisos WHERE IdPermiso = :idPermiso";
        $values=array(':idPermiso' => $idPermiso);
        $results=$dataSource->executeQuery($sql,$values);
        return $results;

    }

    public static function createPermisos($permisos){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="INSERT INTO permisos (IdPermiso,Permiso,IdAsignatura,EmailProfesor) 
        VALUES (:idPermiso, :permiso, :idAsignatura, :emailProfesor)";
        $values=array(':idPermiso' => $permisos->getIdPermiso(),
            ':permiso' => $permisos->getPermiso(),
            ':idAsignatura' => $permisos->getIdAsignatura(),
            ':emailProfesor' => $permisos->getEmailProfesor());
        $results=$dataSource->executeQuery($sql,$values);
        return $results;

    }

    public static function updatePermisos($permisos){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="UPDATE permisos SET IdPermiso = :idPermiso, Permiso = :permiso,IdAsignatura = :idAsignatura,EmailProfesor = :emailProfesor WHERE IdPermiso = :idPermiso";
        $values=array(':idPermiso' => $permisos->getIdPermiso(),
            ':permiso' => $permisos->getPermiso(),
            ':idAsignatura' => $permisos->getIdAsignatura(),
            ':emailProfesor' => $permisos->getEmailProfesor());
        $results=$dataSource->executeQuery($sql,$values);
        return $results;
    }

    public static function deletePermisos($idPermiso){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="DELETE FROM permisos WHERE IdPermiso = :idPermiso";
        $values=array(':idPermiso' => $idPermiso);
        $results=$dataSource->executeQuery($sql,$values);
        return $results;
    }
}