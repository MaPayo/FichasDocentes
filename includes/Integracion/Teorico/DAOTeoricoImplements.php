<?php

namespace es\ucm;

require_once('includes/Integracion/Teorico/DAOTeorico.php');

class DAOTeoricoImplements implements DAOTeorico
{
    public static function findTeorico($idAsignatura)
    {
        $singletonDataSource = new SingletonDataSource();
        $dataSource = $singletonDataSource->getInstance();
        $sql = "SELECT * FROM teorico WHERE IdAsignatura = :idAsignatura";
        $values = array(':idAsignatura' => $idAsignatura);
        $results = $dataSource->executeQuery($sql, $values);
        return $results;
    }

    public static function createTeorico($teorico)
    {
        $singletonDataSource = new SingletonDataSource();
        $dataSource = $singletonDataSource->getInstance();
        $sql = "INSERT INTO teorico (IdTeorico,Creditos,Presencial,IdAsignatura) 
        VALUES (:idTeorico, :creditos, :presencial, :idAsignatura)";
        $values = array(
            ':idTeorico' => $teorico->getIdTeorico(),
            ':creditos' => $teorico->getCreditos(),
            ':presencial' => $teorico->getPresencial(),
            ':idAsignatura' => $teorico->getIdAsignatura()
        );
        $results = $dataSource->executeInsertUpdateDelete($sql, $values);
        return $results;
    }

    public static function updateTeorico($teorico)
    {
        
        $singletonDataSource = new SingletonDataSource();
        $dataSource = $singletonDataSource->getInstance();
        $sql = "UPDATE teorico SET IdTeorico = :idTeorico, Creditos = :creditos,Presencial = :presencial,IdAsignatura = :idAsignatura WHERE IdTeorico = :idTeorico";
        $values = array(
            ':idTeorico' => $teorico->getIdTeorico(),
            ':creditos' => $teorico->getCreditos(),
            ':presencial' => $teorico->getPresencial(),
            ':idAsignatura' => $teorico->getIdAsignatura()
        );
        $results = $dataSource->executeInsertUpdateDelete($sql, $values);
        return $results;
    }

    public static function deleteTeorico($idAsignatura)
    {
        $singletonDataSource = new SingletonDataSource();
        $dataSource = $singletonDataSource->getInstance();
        $sql = "DELETE FROM teorico WHERE IdAsignatura = :idAsignatura";
        $values = array(':idAsignatura' => $idAsignatura);
        $results = $dataSource->executeQuery($sql, $values);
        return $results;
    }
}
