<?php

namespace es\ucm;

require_once('includes/Integracion/Examenes/DAOExamenes.php');

class DAOExamenesImplements implements DAOExamenes
{
    public static function findExamenes($idAsignatura)
    {
        $singletonDataSource = new SingletonDataSource();
        $dataSource = $singletonDataSource->getInstance();
        $sql = "SELECT * FROM examenes WHERE IdAsignatura = :idAsignatura";
        $values = array(':idAsignatura' => $idAsignatura);
        $results = $dataSource->executeQuery($sql, $values);
        return $results;
    }

    public static function createExamenes($examenes)
    {
        $singletonDataSource = new SingletonDataSource();
        $dataSource = $singletonDataSource->getInstance();
        $sql = "INSERT INTO examenes (IdExamenes,Parcial,Laboratorio,Final,Extraordinario,IdAsignatura) 
        VALUES (:idExamenes, :parcial, :laboratorio, :final, :extraordinario, :idAsignatura)";
        $values = array(
            ':idExamenes' => $examenes->getIdExamenes(),
            ':parcial' => $examenes->getParcial(),
            ':laboratorio' => $examenes->getLaboratorio(),
            ':final' => $examenes->getFinal(),
            ':extraordinario' => $examenes->getExtraordinario(),
            ':idAsignatura' => $examenes->getIdAsignatura()
        );
        $results = $dataSource->executeInsertUpdateDelete($sql, $values);
        return $results;
    }

    public static function updateExamenes($examenes)
    {
        $singletonDataSource = new SingletonDataSource();
        $dataSource = $singletonDataSource->getInstance();
        $sql = "UPDATE examenes SET IdExamenes = :idExamenes, Parcial = :parcial, Laboratorio = :laboratorio, Final = :final, Extraordinario = :extraordinario, IdAsignatura = :idAsignatura WHERE IdAsignatura = :idAsignatura";
        $values = array(
            ':idExamenes' => $examenes->getIdExamenes(),
            ':parcial' => $examenes->getParcial(),
            ':laboratorio' => $examenes->getLaboratorio(),
            ':final' => $examenes->getFinal(),
            ':extraordinario' => $examenes->getExtraordinario(),
            ':idAsignatura' => $examenes->getIdAsignatura()
        );
        $results = $dataSource->executeInsertUpdateDelete($sql, $values);
        return $results;
    }

    public static function deleteExamenes($idAsignatura)
    {
        $singletonDataSource = new SingletonDataSource();
        $dataSource = $singletonDataSource->getInstance();
        $sql = "DELETE FROM examenes WHERE IdAsignatura = :idAsignatura";
        $values = array(':idAsignatura' => $idAsignatura);
        $results = $dataSource->executeInsertUpdateDelete($sql, $values);
        return $results;
    }
}
