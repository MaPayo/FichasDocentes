<?php
namespace es\ucm;
require_once('includes/Integracion/Profesor/DAOProfesor.php');

class DAOProfesorImplements implements DAOProfesor{


    public static function findProfesor($email){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="SELECT * FROM profesor WHERE Email = :email";
        $values=array(':email' => $email);
        $results=$dataSource->executeQuery($sql,$values);
        return $results;

    }

    public static function createProfesor($profesor){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="INSERT INTO profesor (Email,Nombre,Departamento,Despacho,Tutoria,Facultad) 
        VALUES (:email, :nombre, :departamento, :despacho, :tutoria, :facultad)";
        $values=array(':email' => $profesor->getEmail(),
            ':nombre' => $profesor->getNombre(),
            ':departamento' => $profesor->getDepartamento(),
            ':despacho' => $profesor->getDespacho(),
            ':tutoria' => $profesor->getTutoria(),
            ':facultad' => $profesor->getFacultad());
        $results=$dataSource->executeInsertUpdateDelete($sql,$values);
        return $results;

    }

    public static function updateProfesor($profesor){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="UPDATE profesor SET Email = :email, Nombre = :nombre,Departamento = :departamento,Despacho = :despacho, Tutoria = :tutoria, Facultad = :facultad WHERE Email = :email";
        $values=array(':email' => $profesor->getEmail(),
            ':nombre' => $profesor->getNombre(),
            ':departamento' => $profesor->getDepartamento(),
            ':despacho' => $profesor->getDespacho(),
            ':tutoria' => $profesor->getTutoria(),
            ':facultad' => $profesor->getFacultad());
        $results=$dataSource->executeInsertUpdateDelete($sql,$values);
        return $results;
    }

    public static function deleteProfesor($email){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="DELETE FROM profesor WHERE Email = :email";
        $values=array(':email' => $email);
        $results=$dataSource->executeInsertUpdateDelete($sql,$values);
        return $results;
    }
}