<?php
namespace es\ucm;
require_once('includes/Integracion/Asignatura/DAOAsignatura.php');

class DAOAsignaturaImplements implements DAOAsignatura{
    
    
    public static function findAsignatura($idAsignatura){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="SELECT * FROM asignatura WHERE IdAsignatura = :idAsignatura";
        $values=array(':idAsignatura' => $idAsignatura);
        $results=$dataSource->executeQuery($sql,$values);
        return $results;

    }

    public static function findAllAsignaturas(){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="SELECT * FROM asignatura";
        $results=$dataSource->executeQuery($sql, null);
        return $results;

    }

    public static function createAsignatura($asignatura){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="INSERT INTO asignatura (IdAsignatura,NombreAsignatura,Materia,Modulo,Caracter,Curso,Semestre,NombreAsignaturaIngles,CreditosMateria,Creditos,Coordinadores,IdMateria) 
        VALUES (:idAsignatura, :nombreAsignatura,:curso,:semestre,:nombreAsignaturaIngles,:creditos,:coordinadores,:idMateria)";
        $values=array(':idAsignatura' => $asignatura->getIdAsignatura(),
        ':nombreAsignatura' => $asignatura->getNombreAsignatura(),
        ':curso' => $asignatura->getCurso(),
        ':semestre' => $asignatura->getSemestre(),
        ':nombreAsignaturaIngles' => $asignatura->getNombreAsignaturaIngles(),
        ':creditos' => $asignatura->getCreditos(),
        ':coordinadores' => $asignatura->getCoordinadores(),
        ':idMateria' => $asignatura->getIdMateria());
        $results=$dataSource->executeInsertUpdateDelete($sql,$values);
        return $results;

    }

    public static function updateAsignatura($asignatura){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="UPDATE asignatura SET IdAsignatura = :idAsignatura, NombreAsignatura = :nombreAsignatura, Curso = :curso, Semestre = :semestre, NombreAsignaturaIngles = :nombreAsignaturaIngles, Creditos = :creditos, Coordinadores = :coordinadores, IdMateria = :idMateria WHERE IdAsignatura = :idAsignatura";
        $values=array(':idAsignatura' => $asignatura->getIdAsignatura(),
        ':nombreAsignatura' => $asignatura->getNombreAsignatura(),
        ':curso' => $asignatura->getCurso(),
        ':semestre' => $asignatura->getSemestre(),
        ':nombreAsignaturaIngles' => $asignatura->getNombreAsignaturaIngles(),
        ':creditos' => $asignatura->getCreditos(),
        ':coordinadores' => $asignatura->getCoordinadores(),
        ':idMateria' => $asignatura->getIdMateria());
        $results=$dataSource->executeInsertUpdateDelete($sql,$values);
        return $results;
    }

    public static function deleteAsignatura($idAsignatura){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="DELETE FROM asignatura WHERE IdAsignatura = :idAsignatura";
        $values=array(':idAsignatura' => $idAsignatura);
        $results=$dataSource->executeInsertUpdateDelete($sql,$values);
        return $results;
    }
}