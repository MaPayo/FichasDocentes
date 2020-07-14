<?php

namespace es\ucm;

require_once('includes/Integracion/Asignatura/DAOAsignatura.php');

class DAOAsignaturaImplements implements DAOAsignatura
{

    public static function findAsignatura($idAsignatura)
    {
        $singletonDataSource = new SingletonDataSource();
        $dataSource = $singletonDataSource->getInstance();
        $sql = "SELECT * FROM asignatura WHERE IdAsignatura = :idAsignatura";
        $values = array(':idAsignatura' => $idAsignatura);
        $results = $dataSource->executeQuery($sql, $values);
        return $results;
    }

    public static function createAsignatura($asignatura)
    {
        $singletonDataSource = new SingletonDataSource();
        $dataSource = $singletonDataSource->getInstance();
        $sql = "INSERT INTO asignatura (IdAsignatura,NombreAsignatura,Abreviatura,Curso,Semestre,NombreAsignaturaIngles,Creditos,CoordinadorPrincipal,CoordinadorLaboratorio,Estado,IdMateria) 
        VALUES (:idAsignatura, :nombreAsignatura, :abreviatura, :curso, :semestre,:nombreAsignaturaIngles,:creditos,:coordinadorPrincipal, :coordinadorLaboratorio, :estado,:idMateria)";
        $values = array(
            ':idAsignatura' => $asignatura->getIdAsignatura(),
            ':nombreAsignatura' => $asignatura->getNombreAsignatura(),
            ':abreviatura' => $asignatura->getAbreviatura(),
            ':curso' => $asignatura->getCurso(),
            ':semestre' => $asignatura->getSemestre(),
            ':nombreAsignaturaIngles' => $asignatura->getNombreAsignaturaIngles(),
            ':creditos' => $asignatura->getCreditos(),
            ':coordinadorPrincipal' => $asignatura->getCoordinadorPrincipal(),
            ':coordinadorLaboratorio' => $asignatura->getCoordinadorLaboratorio(),
            ':estado' => $asignatura->getEstado(),
            ':idMateria' => $asignatura->getIdMateria()
        );
        $results = $dataSource->executeInsertUpdateDelete($sql, $values);
        return $results;
    }

    public static function updateAsignatura($asignatura)
    {
        $singletonDataSource = new SingletonDataSource();
        $dataSource = $singletonDataSource->getInstance();
        $sql = "UPDATE asignatura SET IdAsignatura = :idAsignatura, NombreAsignatura = :nombreAsignatura, Abreviatura = :abreviatura, Curso = :curso, Semestre = :semestre, NombreAsignaturaIngles = :nombreAsignaturaIngles, Creditos = :creditos, CoordinadorPrincipal = :coordinadorPrincipal, CoordinadorLaboratorio = :coordinadorLaboratorio, Estado = :estado, IdMateria = :idMateria WHERE IdAsignatura = :idAsignatura";
        $values = array(
            ':idAsignatura' => $asignatura->getIdAsignatura(),
            ':nombreAsignatura' => $asignatura->getNombreAsignatura(),
            ':abreviatura' => $asignatura->getAbreviatura(),
            ':curso' => $asignatura->getCurso(),
            ':semestre' => $asignatura->getSemestre(),
            ':nombreAsignaturaIngles' => $asignatura->getNombreAsignaturaIngles(),
            ':creditos' => $asignatura->getCreditos(),
            ':coordinadorPrincipal' => $asignatura->getCoordinadorPrincipal(),
            ':coordinadorLaboratorio' => $asignatura->getCoordinadorLaboratorio(),
            ':estado' => $asignatura->getEstado(),
            ':idMateria' => $asignatura->getIdMateria()
        );
        $results = $dataSource->executeInsertUpdateDelete($sql, $values);
        return $results;
    }

    public static function deleteAsignatura($idAsignatura)
    {
        $singletonDataSource = new SingletonDataSource();
        $dataSource = $singletonDataSource->getInstance();
        $sql = "DELETE FROM asignatura WHERE IdAsignatura = :idAsignatura";
        $values = array(':idAsignatura' => $idAsignatura);
        $results = $dataSource->executeInsertUpdateDelete($sql, $values);
        return $results;
    }

    public static function listAsignatura($idMateria)
    {
        $singletonDataSource = new SingletonDataSource();
        $dataSource = $singletonDataSource->getInstance();
        $sql = "SELECT * FROM asignatura WHERE IdMateria = :idMateria";
        $values = array(':idMateria' => $idMateria);
        $results = $dataSource->executeQuery($sql, $values);
        return $results;
    }
}
