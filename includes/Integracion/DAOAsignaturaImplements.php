<?php

namespace es\ucm;

class DAOAsignaturaImplements implements DAOAsignatura{
    
    
    public static function findAsignatura($idAsignatura){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="SELECT * FROM Asignatura WHERE idIdAsignatura = :idAsignatura";
        $values=array(':idAsignatura' => $idAsignatura);
        $results=$dataSource->executeQuery($sql,$values);
        return $results;

    }

    public static function createAsignatura($asignatura){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="INSERT INTO Asignatura (IdAsignatura,NombreAsignatura,Materia,Modulo,Caracter,Curso,Semestre,NombreAsignaturaIngles,CreditosMateria,Creditos,Coordinadores,CodigoGrado) 
        VALUES (:idAsignatura, :nombreAsignatura, :materia, :modulo, :caracter,:curso,:semestre,:nombreAsignaturaIngles,:creditosMateria,:creditos,:coordinadores,:codigoGrado)";
        $values=array(':idAsignatura' => $asignatura->getIdAsignatura(),
        ':nombreAsignatura' => $asignatura->getNombreAsignatura(),
        ':materia' => $asignatura->getMateria(),
        ':modulo' => $asignatura->getModulo(),
        ':caracter' => $asignatura->caracter(),
        ':curso' => $asignatura->getCurso(),
        ':semestre' => $asignatura->getSemestre(),
        ':nombreAsignaturaIngles' => $asignatura->getNombreAsignaturaIngles(),
        ':creditosMateria' => $asignatura->getCreditosMateria(),
        ':creditos' => $asignatura->getCreditos(),
        ':coordinadores' => $asignatura->getCoordinadores(),
        ':codigoGrado' => $asignatura->getCodigoGrado());
        $results=$dataSource->executeQuery($sql,$values);
        return $results;

    }

    public static function updateAsignatura($asignatura){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="UPDATE Asignatura SET IdAsignatura = :idAsignatura, NombreAsignatura = :nombreAsignatura, Materia = :materia, Modulo = :modulo, Caracter = :caracter, Curso = :curso, Semestre = :semestre, NombreAsignaturaIngles = :nombreAsignaturaIngles, CreditosMateria = :creditosMateria, Creditos = :creditos, Coordinadores = :coordinadores, CodigoGrado = :codigoGrado WHERE IdAsignatura = :idAsignatura";
        $values=array(':idAsignatura' => $asignatura->getIdAsignatura(),
        ':nombreAsignatura' => $asignatura->getNombreAsignatura(),
        ':materia' => $asignatura->getMateria(),
        ':modulo' => $asignatura->getModulo(),
        ':caracter' => $asignatura->caracter(),
        ':curso' => $asignatura->getCurso(),
        ':semestre' => $asignatura->getSemestre(),
        ':nombreAsignaturaIngles' => $asignatura->getNombreAsignaturaIngles(),
        ':creditosMateria' => $asignatura->getCreditosMateria(),
        ':creditos' => $asignatura->getCreditos(),
        ':coordinadores' => $asignatura->getCoordinadores(),
        ':codigoGrado' => $asignatura->getCodigoGrado());
        $results=$dataSource->executeQuery($sql,$values);
        return $results;
    }

    public static function deleteAsignatura($idAsignatura){
        $singletonDataSource=new SingletonDataSource();
        $dataSource=$singletonDataSource->getInstance();
        $sql="DELETE FROM Asignatura WHERE IdAsignatura = :idAsignatura";
        $values=array(':idAsignatura' => $idAsignatura);
        $results=$dataSource->executeQuery($sql,$values);
        return $results;
    }
}