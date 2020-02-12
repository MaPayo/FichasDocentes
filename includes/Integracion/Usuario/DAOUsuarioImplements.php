<?php
namespace es\ucm;
require_once('includes/Integracion/Usuario/DAOUsuario.php');

class DAOUsuarioImplements implements DAOUsuario{

    public static function findUsuario($email){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="SELECT * FROM usuario WHERE Email = :email";
        $values=array(':email' => $email);
        $results=$dataSource->executeQuery($sql,$values);
        return $results;

    }

    public static function createUsuario($usuario){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="INSERT INTO usuario (Email,Password) 
        VALUES (:email, :password)";
        $values=array(':email' => $usuario->getEmail(),
            ':password' => $usuario->getPassword());
        $results=$dataSource->executeQuery($sql,$values);
        return $results;

    }

    public static function updateUsuario($usuario){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="UPDATE usuario SET Email = :email, Password = :password WHERE Email = :email";
        $values=array(':email' => $usuario->getEmail(),
            ':password' => $usuario->getPassword());
        $results=$dataSource->executeQuery($sql,$values);
        return $results;
    }

    public static function deleteUsuario($email){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="DELETE FROM usuario WHERE Email = :email";
        $values=array(':email' => $email);
        $results=$dataSource->executeQuery($sql,$values);
        return $results;
    }
}