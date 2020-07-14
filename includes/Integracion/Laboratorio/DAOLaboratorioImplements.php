<?php

namespace es\ucm;

require_once('includes/Integracion/Laboratorio/DAOLaboratorio.php');

class DAOLaboratorioImplements implements DAOLaboratorio
{
    public static function findLaboratorio($idAsignatura)
    {
        $singletonDataSource = new SingletonDataSource();
        $dataSource = $singletonDataSource->getInstance();
        $sql = "SELECT * FROM laboratorio WHERE IdAsignatura = :idAsignatura";
        $values = array(':idAsignatura' => $idAsignatura);
        $results = $dataSource->executeQuery($sql, $values);
        return $results;
    }

    public static function createLaboratorio($laboratorio)
    {
        $singletonDataSource = new SingletonDataSource();
        $dataSource = $singletonDataSource->getInstance();
        $sql = "INSERT INTO laboratorio (IdLaboratorio,Creditos,Presencial,IdAsignatura) 
        VALUES (:idLaboratorio, :creditos, :presencial, :idAsignatura)";
        $values = array(
            ':idLaboratorio' => $laboratorio->getIdLaboratorio(),
            ':creditos' => $laboratorio->getCreditos(),
            ':presencial' => $laboratorio->getPresencial(),
            ':idAsignatura' => $laboratorio->getIdAsignatura()
        );
        $results = $dataSource->executeInsertUpdateDelete($sql, $values);
        return $results;
    }

    public static function updateLaboratorio($laboratorio)
    {
        $singletonDataSource = new SingletonDataSource();
        $dataSource = $singletonDataSource->getInstance();
        $sql = "UPDATE laboratorio SET IdLaboratorio = :idLaboratorio, Creditos = :creditos,Presencial = :presencial,IdAsignatura = :idAsignatura WHERE IdLaboratorio = :idLaboratorio";
        $values = array(
            ':idLaboratorio' => $laboratorio->getIdLaboratorio(),
            ':creditos' => $laboratorio->getCreditos(),
            ':presencial' => $laboratorio->getPresencial(),
            ':idAsignatura' => $laboratorio->getIdAsignatura()
        );
        $results = $dataSource->executeInsertUpdateDelete($sql, $values);
        return $results;
    }

    public static function deleteLaboratorio($idAsignatura)
    {
        $singletonDataSource = new SingletonDataSource();
        $dataSource = $singletonDataSource->getInstance();
        $sql = "DELETE FROM laboratorio WHERE IdAsignatura = :idAsignatura";
        $values = array(':idAsignatura' => $idAsignatura);
        $results = $dataSource->executeInsertUpdateDelete($sql, $values);
        return $results;
    }
}
