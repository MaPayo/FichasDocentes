<?php

namespace es\ucm;

require_once('includes/Integracion/Metodologia/DAOMetodologia.php');

class DAOMetodologiaImplements implements DAOMetodologia
{
    public static function findMetodologia($idAsignatura)
    {
        $singletonDataSource = new SingletonDataSource();
        $dataSource = $singletonDataSource->getInstance();
        $sql = "SELECT * FROM metodologia WHERE IdAsignatura = :idAsignatura";
        $values = array(':idAsignatura' => $idAsignatura);
        $results = $dataSource->executeQuery($sql, $values);
        return $results;
    }

    public static function createMetodologia($metodologia)
    {
        $singletonDataSource = new SingletonDataSource();
        $dataSource = $singletonDataSource->getInstance();
        $sql = "INSERT INTO metodologia (IdMetodologia,Metodologia,Metodologiai,IdAsignatura) 
        VALUES (:idMetodologia, :metodologia, :metodologiaI, :idAsignatura)";
        $values = array(
            ':idMetodologia' => $metodologia->getIdMetodologia(),
            ':metodologia' => $metodologia->getMetodologia(),
            ':metodologiaI' => $metodologia->getMetodologiaI(),
            ':idAsignatura' => $metodologia->getIdAsignatura()
        );
        $results = $dataSource->executeInsertUpdateDelete($sql, $values);
        return $results;
    }

    public static function updateMetodologia($metodologia)
    {
        $singletonDataSource = new SingletonDataSource();
        $dataSource = $singletonDataSource->getInstance();
        $sql = "UPDATE metodologia SET IdMetodologia = :idMetodologia, Metodologia = :metodologia,Metodologiai = :metodologiaI,IdAsignatura = :idAsignatura WHERE IdMetodologia = :idMetodologia";
        $values = array(
            ':idMetodologia' => $metodologia->getIdMetodologia(),
            ':metodologia' => $metodologia->getMetodologia(),
            ':metodologiaI' => $metodologia->getMetodologiaI(),
            ':idAsignatura' => $metodologia->getIdAsignatura()
        );
        $results = $dataSource->executeInsertUpdateDelete($sql, $values);
        return $results;
    }

    public static function deleteMetodologia($idAsignatura)
    {
        $singletonDataSource = new SingletonDataSource();
        $dataSource = $singletonDataSource->getInstance();
        $sql = "DELETE FROM metodologia WHERE IdAsignatura = :idAsignatura";
        $values = array(':idAsignatura' => $idAsignatura);
        $results = $dataSource->executeInsertUpdateDelete($sql, $values);
        return $results;
    }
}
