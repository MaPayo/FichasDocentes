<?php

namespace es\ucm;

require_once('includes/Integracion/Materia/DAOMateria.php');

class DAOMateriaImplements implements DAOMateria
{


    public static function findMateria($idMateria)
    {
        $singletonDataSource = new SingletonDataSource();
        $dataSource = $singletonDataSource->getInstance();
        $sql = "SELECT * FROM materia WHERE IdMateria = :idMateria";
        $values = array(':idMateria' => $idMateria);
        $results = $dataSource->executeQuery($sql, $values);
        return $results;
    }

    public static function createMateria($Materia)
    {
        $singletonDataSource = new SingletonDataSource();
        $dataSource = $singletonDataSource->getInstance();
        $sql = "INSERT INTO materia (IdMateria, NombreMateria, Caracter, CreditosMateria, Activo, IdModulo) 
        VALUES (:idMateria, :nombreMateria, :caracter, :creditosMateria,:activo, :idModulo)";
        $values = array(
            ':idMateria' => $Materia->getIdMateria(),
            ':nombreMateria' => $Materia->getNombreMateria(),
            ':caracter' => $Materia->getCaracter(),
            ':creditosMateria' => $Materia->getCreditosMateria(),
            ':activo'=>$Materia->getActivo(),
            ':idModulo' => $Materia->getIdModulo()
        );
        $results = $dataSource->executeInsertUpdateDelete($sql, $values);
        return $results;
    }

    public static function updateMateria($Materia)
    {
        $singletonDataSource = new SingletonDataSource();
        $dataSource = $singletonDataSource->getInstance();
        $sql = "UPDATE materia SET IdMateria = :idMateria, NombreMateria = :nombreMateria, Caracter = :caracter, CreditosMateria = :creditosMateria, Activo = :activo,IdModulo = :idModulo WHERE IdMateria = :idMateria";
        $values = array(
            ':idMateria' => $Materia->getIdMateria(),
            ':nombreMateria' => $Materia->getNombreMateria(),
            ':caracter' => $Materia->getCaracter(),
            ':creditosMateria' => $Materia->getCreditosMateria(), 
            ':activo'=>$Materia->getActivo(),
            ':idModulo' => $Materia->getIdModulo()
        );
        $results = $dataSource->executeInsertUpdateDelete($sql, $values);
        return $results;
    }

    public static function deleteMateria($idMateria)
    {
        $singletonDataSource = new SingletonDataSource();
        $dataSource = $singletonDataSource->getInstance();
        $sql = "DELETE FROM materia WHERE IdMateria = :idMateria";
        $values = array(':idMateria' => $idMateria);
        $results = $dataSource->executeInsertUpdateDelete($sql, $values);
        return $results;
    }

    public static function listMateria($idModulo)
    {
        $singletonDataSource = new SingletonDataSource();
        $dataSource = $singletonDataSource->getInstance();
        $sql = "SELECT * FROM materia WHERE IdModulo = :idModulo";
        $values = array(':idModulo' => $idModulo);
        $results = $dataSource->executeQuery($sql, $values);
        return $results;
    }
}
