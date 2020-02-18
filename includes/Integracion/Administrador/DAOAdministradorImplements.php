<?php
namespace es\ucm;

require_once('includes/Integracion/Administrador/DAOAdministrador.php');

class DAOAdministradorImplements implements DAOAdministrador{
    
    
    public static function findAdministrador($email){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="SELECT * FROM administrador WHERE Email = :email";
        $values=array(':email' => $email);
        $results=$dataSource->executeQuery($sql,$values);
        return $results;

    }

    public static function createAdministrador($administrador){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="INSERT INTO administrador (Email, Nombre) 
        VALUES (:email, :nombre)";
        $values=array(':email' => $administrador->getEmail(),
        ':nombre' => $administrador->getNombre());
        $results=$dataSource->executeQuery($sql,$values);
        return $results;

    }

    public static function updateAdministrador($administrador){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="UPDATE Administrador SET Email = :email, Nombre = :nombre WHERE Email = :email";
        $values=array(':email' => $administrador->getEmail(),
        ':nombre' => $administrador->getNombre());
        $results=$dataSource->executeQuery($sql,$values);
        return $results;
    }

    public static function deleteAdministrador($email){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="DELETE FROM Administrador WHERE Email = :email";
        $values=array(':email' => $email);
        $results=$dataSource->executeQuery($sql,$values);
        return $results;
    }
}